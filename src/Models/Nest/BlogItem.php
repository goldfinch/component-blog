<?php

namespace Goldfinch\Component\Blog\Models\Nest;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Assets\Image;
use SilverStripe\Control\Director;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Blog\Admin\BlogAdmin;
use Goldfinch\Component\Blog\Pages\Nest\Blog;
use Goldfinch\Component\Blog\Configs\BlogConfig;

class BlogItem extends NestedObject
{
    use FielderTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Blog::class;
    public static $nest_down_parents = [];

    private static $table_name = 'BlogItem';
    private static $singular_name = 'article';
    private static $plural_name = 'articles';

    private static $db = [
        'Summary' => 'Text',
        'Text' => 'HTMLText',
        'Date' => 'Datetime',
        'Author' => 'Varchar',
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
        'Image.CMSThumbnail' => 'Image',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->datetime('Date', 'Date', $this->Date ?? date('Y-m-d H:i:s')),
                $fielder->string('Author'),
                $fielder->text('Summary'),
                $fielder->html('Text'),
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

    public function getNextItem()
    {
        return BlogItem::get()
            ->filter(['Date:LessThan' => $this->Date])
            ->Sort('Date DESC')
            ->first();
    }

    public function getPreviousItem()
    {
        return BlogItem::get()
            ->filter(['Date:GreaterThan' => $this->Date])
            ->first();
    }

    public function getOtherItems()
    {
        return BlogItem::get()
            ->filter('ID:not', $this->ID)
            ->limit(6);
    }

    public function CMSEditLink()
    {
        $admin = new BlogAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }
}
