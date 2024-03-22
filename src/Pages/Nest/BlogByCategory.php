<?php

namespace Goldfinch\Component\Blog\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;
use Goldfinch\Component\Blog\Controllers\Nest\BlogByCategoryController;

class BlogByCategory extends Nest
{
    use Millable;

    private static $table_name = 'BlogByCategory';

    private static $controller_name = BlogByCategoryController::class;

    private static $allowed_children = [];

    private static $icon_class = 'font-icon-news';

    private static $can_be_root = false;

    private static $description = 'Nested pseudo page, to display individual categories. Can only be added within Blog page as a child page';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->remove([
            'Content',
            'MenuTitle',
        ]);

        $fielder->description('Title', 'Does not show up anywhere except SiteTree in the CMS');

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function getSettingsFields()
    {
        $fields = parent::getSettingsFields()->initFielder($this);

        $fielder = $fields->getFielder();

        if ($this->NestedPseudo) {
            $fielder->removeFieldsInTab('Root.Search');
            $fielder->removeFieldsInTab('Root.General');
            $fielder->removeFieldsInTab('Root.SEO');
        }

        $fielder->disable(['NestedObject']); // NestedPseudo

        $this->extend('updateSettingsFields', $fields);

        return $fields;
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = BlogCategory::class;
        // $this->NestedPseudo = 1;
        $this->ShowInMenus = 0;
        $this->ShowInSearch = 0;
    }
}
