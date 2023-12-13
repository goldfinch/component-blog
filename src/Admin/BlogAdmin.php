<?php

namespace Goldfinch\Component\Blog\Admin;

use Goldfinch\Component\Blog\Models\Nest\BlogItem;
use Goldfinch\Component\Blog\Blocks\BlogBlock;
use Goldfinch\Component\Blog\Configs\BlogConfig;
use Goldfinch\Component\Blog\Models\Nest\BlogTag;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class BlogAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'blog';
    private static $menu_title = 'Blog';
    private static $menu_icon_class = 'font-icon-news';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        BlogItem::class => [
            'title'=> 'Articles',
        ],
        BlogCategory::class => [
            'title'=> 'Categories',
        ],
        BlogTag::class => [
            'title'=> 'Tags',
        ],
        BlogBlock::class => [
            'title'=> 'Blocks',
        ],
        BlogConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
