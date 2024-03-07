<?php

namespace Goldfinch\Component\Blog\Configs;

use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\TemplateGlobalProvider;

class BlogConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig;

    private static $table_name = 'BlogConfig';

    private static $db = [
        'ItemsPerPage' => 'Int(10)',
        'DisabledCategories' => 'Boolean',
        'DisabledTags' => 'Boolean',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $fields->fielder($this);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('ItemsPerPage', 'Items per page')->setDescription('used in paginated/loadable list'),
                $fielder->checkbox('DisabledCategories', 'Disabled categories'),
                $fielder->checkbox('DisabledTags', 'Disabled tags'),
            ],
        ]);

        $fielder->validate(['ItemsPerPage' => function($value, $fail) {
            if (!$this->ID && $value == null) {
                // Skip this validation on config creation as it can be created without user interaction. A default value assigned through db for `ItemsPerPage` will cover it here
            } else {
                $value = (int) $value;
                $min = 1;
                $max = 100;
                if (!$value || $value < $min || $value > $max) {
                    $fail('The :attribute must be between '.$min.' and '.$max.'.');
                }
            }
        }]);

        return $fields;
    }
}
