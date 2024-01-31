<?php

namespace Goldfinch\Component\Blog\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Blog\Models\Nest\BlogItem;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;
use Goldfinch\Component\Blog\Pages\Nest\BlogByCategory;
use Goldfinch\Component\Blog\Controllers\Nest\BlogController;

class Blog extends Nest
{
    use FielderTrait, Millable;

    private static $table_name = 'Blog';

    private static $controller_name = BlogController::class;

    private static $allowed_children = [BlogByCategory::class];

    private static $icon_class = 'font-icon-news';

    private static $defaults = [
        'NestedObject' => BlogItem::class,
    ];

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        $fielder->disable(['NestedObject', 'NestedPseudo']);
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = BlogItem::class;
        $this->NestedPseudo = 0;
    }

    public function Categories()
    {
        return BlogCategory::get();
    }
}
