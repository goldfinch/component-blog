<?php

namespace Goldfinch\Component\Blog\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Blog\Controllers\Nest\BlogController;

class Blog extends Nest
{
    use FielderTrait;

    private static $table_name = 'Blog';

    private static $controller_name = BlogController::class;

    private static $icon_class = 'font-icon-news';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        // ..
    }
}
