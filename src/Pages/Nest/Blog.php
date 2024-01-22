<?php

namespace Goldfinch\Component\Blog\Pages\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Blog\Controllers\Nest\BlogController;

class Blog extends Nest
{
    use HarvestTrait;

    private static $table_name = 'Blog';

    private static $controller_name = BlogController::class;

    private static $icon_class = 'font-icon-news';

    public function harvest(Harvest $harvest): void
    {
        // ..
    }

    public function harvestSettings(Harvest $harvest): void
    {
        // ..
    }
}
