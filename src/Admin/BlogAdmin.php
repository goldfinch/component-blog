<?php

namespace Goldfinch\Component\Blog\Admin;

use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Component\Blog\Blocks\BlogBlock;
use Goldfinch\Component\Blog\Configs\BlogConfig;
use Goldfinch\Component\Blog\Models\Nest\BlogTag;
use Goldfinch\Component\Blog\Models\Nest\BlogItem;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;

class BlogAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'blog';
    private static $menu_title = 'Blog';
    private static $menu_icon_class = 'font-icon-news';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        BlogItem::class => [
            'title' => 'Articles',
        ],
        BlogCategory::class => [
            'title' => 'Categories',
        ],
        BlogTag::class => [
            'title' => 'Tags',
        ],
        BlogBlock::class => [
            'title' => 'Blocks',
        ],
        BlogConfig::class => [
            'title' => 'Settings',
        ],
    ];
}
