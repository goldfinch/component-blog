<?php

namespace Goldfinch\Component\Blog\Models\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Harvest\Traits\HarvestTrait;

class BlogTag extends NestedObject
{
    use HarvestTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = null;
    public static $nest_down_parents = [];

    private static $table_name = 'BlogTag';
    private static $singular_name = 'tag';
    private static $plural_name = 'tags';

    private static $db = [];

    private static $belongs_many_many = [
        'Items' => BlogItem::class,
    ];

    public function harvest(Harvest $harvest): void
    {
        $harvest->require(['Title']);

        $harvest->fields([
            'Root.Main' => [$harvest->string('Title')],
        ]);
    }
}
