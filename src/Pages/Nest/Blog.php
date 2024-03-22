<?php

namespace Goldfinch\Component\Blog\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Component\Blog\Models\Nest\BlogTag;
use Goldfinch\Component\Blog\Models\Nest\BlogItem;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;
use Goldfinch\Component\Blog\Pages\Nest\BlogByCategory;
use Goldfinch\Component\Blog\Controllers\Nest\BlogController;

class Blog extends Nest
{
    use Millable;

    private static $table_name = 'Blog';

    private static $controller_name = BlogController::class;

    private static $allowed_children = [BlogByCategory::class];

    private static $icon_class = 'font-icon-news';

    private static $defaults = [
        'NestedObject' => BlogItem::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        // ..

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function getSettingsFields()
    {
        $fields = parent::getSettingsFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->disable(['NestedObject', 'NestedPseudo']);

        $this->extend('updateSettingsFields', $fields);

        return $fields;
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

    public function Tags()
    {
        return BlogTag::get();
    }
}
