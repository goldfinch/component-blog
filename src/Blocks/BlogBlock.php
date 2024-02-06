<?php

namespace Goldfinch\Component\Blog\Blocks;

use Goldfinch\Blocks\Models\BlockElement;
use Goldfinch\Component\Blog\Models\Nest\BlogTag;
use Goldfinch\Component\Blog\Models\Nest\BlogItem;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;

class BlogBlock extends BlockElement
{
    private static $table_name = 'BlogBlock';
    private static $singular_name = 'Blog';
    private static $plural_name = 'Blog';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-news';

    public function Items()
    {
        return BlogItem::get();
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
