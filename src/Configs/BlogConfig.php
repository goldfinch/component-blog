<?php

namespace Goldfinch\Component\Blog\Configs;

use Goldfinch\Harvest\Harvest;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\View\TemplateGlobalProvider;

class BlogConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, HarvestTrait;

    private static $table_name = 'BlogConfig';

    private static $db = [
        'DisabledCategories' => 'Boolean',
        'DisabledTags' => 'Boolean',
    ];

    public function harvest(Harvest $harvest): void
    {
        $harvest->fields([
            'Root.Main' => [
                $harvest->checkbox('DisabledCategories', 'Disabled categories'),
                $harvest->checkbox('DisabledTags', 'Disabled tags'),
            ],
        ]);
    }
}
