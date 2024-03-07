<?php

namespace Goldfinch\Component\Blog\Models\Nest;

use Goldfinch\Mill\Traits\Millable;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\Controller;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Blog\Configs\BlogConfig;
use Goldfinch\Component\Blog\Pages\Nest\BlogByCategory;

class BlogCategory extends NestedObject
{
    use Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = BlogByCategory::class;
    public static $nest_down_parents = [];

    private static $table_name = 'BlogCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Content' => 'HTMLText',
    ];

    private static $belongs_many_many = [
        'Items' => BlogItem::class,
    ];

    private static $summary_fields = [
        'Items.Count' => 'Articles',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $fields->fielder($this);

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
            ],
        ]);

        return $fields;
    }

    public function List()
    {
        if (Controller::has_curr()) {
            $ctrl = Controller::curr();

            $cfg = BlogConfig::current_config();

            return PaginatedList::create($this->Items(), $ctrl->getRequest())->setPageLength($cfg->ItemsPerPage ?? 10);
        }
    }

    public function OtherCategories($type = 'mix', $limit = 6, $escapeEmpty = true)
    {
        $filter = ['ID:not' => $this->ID];

        if ($escapeEmpty) {
            $filter['Items.Count():GreaterThan'] = 0;
        }

        return BlogCategory::get()->filter($filter)->shuffle()->limit($limit);
    }
}
