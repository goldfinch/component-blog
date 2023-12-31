<?php

namespace Goldfinch\Component\Blog\Pages\Nest;

use Goldfinch\Component\Blog\Controllers\Nest\BlogController;
use Goldfinch\Nest\Pages\Nest;

class Blog extends Nest
{
    private static $table_name = 'Blog';
    private static $controller_name = BlogController::class;

    private static $icon_class = 'font-icon-news';
}
