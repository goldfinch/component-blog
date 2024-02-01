<?php

namespace Goldfinch\Component\Blog\Models\Nest;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataList;
use SilverStripe\Control\Director;
use Goldfinch\Mill\Traits\Millable;
use SilverStripe\Control\HTTPRequest;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Blog\Admin\BlogAdmin;
use Goldfinch\Component\Blog\Pages\Nest\Blog;
use Goldfinch\Component\Blog\Configs\BlogConfig;
use Goldfinch\Component\Blog\Models\Nest\BlogItem;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;

class BlogItem extends NestedObject
{
    use FielderTrait, Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Blog::class;
    public static $nest_down_parents = [];

    private static $table_name = 'BlogItem';
    private static $singular_name = 'article';
    private static $plural_name = 'articles';

    private static $db = [
        'Summary' => 'Text',
        'Content' => 'HTMLText',
        'Date' => 'Datetime',
        'Publisher' => 'Varchar',
    ];

    private static $many_many = [
        'Categories' => BlogCategory::class,
        'Tags' => BlogTag::class,
    ];

    private static $many_many_extraFields = [
        'Categories' => [
            'SortExtra' => 'Int',
        ],
        'Tags' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = ['Image', 'Categories', 'Tags'];

    private static $summary_fields = [
        // 'DateForHuman' => 'Date', // unsortable
        'Date' => 'Date', // sortable
        'Categories.Count' => 'Categories',
        'Tags.Count' => 'Tags',
    ];

    private static $searchable_list_fields = [
        'Title', 'Summary', 'Content',
    ];

    private static $default_sort = 'Date DESC, Created DESC';

    public function GridItemSummaryList()
    {
        $list = parent::GridItemSummaryList();

        $list['Image'] = $this->Image()->CMSThumbnail();
        $list['Date'] = $this->DateForHuman() . ' <span style="font-style: italic">(' . $this->dbObject('Date')->Ago() . ')</span>';

        if ($this->Publisher) {
            $list['Publisher'] = $this->Publisher;
        }

        return $list;
    }

    public function summaryFields()
    {
        $fields = parent::summaryFields();

        $cfg = BlogConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($fields['Categories.Count']);
        }

        if ($cfg->DisabledTags) {
            unset($fields['Tags.Count']);
        }

        return $fields;
    }

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->datetime('Date', 'Date', $this->Date ?? date('Y-m-d H:i:s')),
                $fielder->string('Publisher'),
                $fielder->text('Summary'),
                $fielder->html('Content'),
                $fielder->tag('Categories'),
                $fielder->tag('Tags'),
                ...$fielder->media('Image'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('blog');

        $cfg = BlogConfig::current_config();

        if ($cfg->DisabledCategories) {
            $fielder->remove('Categories');
        }

        if ($cfg->DisabledTags) {
            $fielder->remove('Tags');
        }
    }

    // type : mix | inside | outside
    public function OtherItems($type = 'mix', $limit = 6)
    {
        $model = BlogItem::get()->filter(['ID:not' => $this->ID])->shuffle();

        if ($type == 'mix') {
            //
        } else if ($type == 'inside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID', $categories);
            }
        } else if ($type == 'outside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID:not', $categories);
            }
        }

        return $model->limit($limit);
    }

    public function CMSEditLink()
    {
        $admin = new BlogAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }

    public function DateForHuman()
    {
        return $this->Date ? $this->dbObject('Date')->Format("d MMMM YYYY, HH:mm") : null;
    }

    /**
     * Extend nested listExtraFilter by adding additional filter option (category)
     */
    public static function listExtraFilter(DataList $list, HTTPRequest $request): DataList
    {
        $list = parent::listExtraFilter($list, $request);

        $filter = [];

        if ($request->getVar('category'))
        {
            $filter['Categories.URLSegment'] = $request->getVar('category');
        }

        if ($request->getVar('tag'))
        {
            $filter['Tags.URLSegment'] = $request->getVar('tag');
        }

        if (count($filter)) {
            $list = $list->filter($filter);
        }

        return $list;
    }

    /**
     * Extend nested loadable by adding additional filter option (category)
     */
    public static function loadable(DataList $list, HTTPRequest $request, $data, $config): DataList
    {
        $list = parent::loadable($list, $request, $data, $config);

        if ($data && !empty($data))
        {
            $filter = [];

            if (isset($data['urlparams']['category']) && $data['urlparams']['category']) {

                $filter['Categories.URLSegment'] = $data['urlparams']['category'];
            }

            if (isset($data['urlparams']['tag']) && $data['urlparams']['tag']) {

                $filter['Tags.URLSegment'] = $data['urlparams']['tag'];
            }

            if (count($filter)) {
                $list = $list->filter($filter);
            }
        }

        return $list;
    }
}
