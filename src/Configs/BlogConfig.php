<?php

namespace Goldfinch\Component\Blog\Configs;

use Goldfinch\Fielder\Fielder;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use SilverStripe\View\TemplateGlobalProvider;

class BlogConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, FielderTrait;

    private static $table_name = 'BlogConfig';

    private static $db = [
        'DisabledCategories' => 'Boolean',
        'DisabledTags' => 'Boolean',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->fields([
            'Root.Main' => [
                $fielder->checkbox('DisabledCategories', 'Disabled categories'),
                $fielder->checkbox('DisabledTags', 'Disabled tags'),
            ],
        ]);
    }
}
