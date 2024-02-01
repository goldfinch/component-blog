<?php

namespace Goldfinch\Component\Blog\Blocks;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Blog\Models\Nest\BlogTag;
use Goldfinch\Component\Blog\Models\Nest\BlogItem;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;

class BlogBlock extends BaseElement
{
    use FielderTrait, Millable;

    private static $table_name = 'BlogBlock';
    private static $singular_name = 'Blog';
    private static $plural_name = 'Blog';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-news';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

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

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }
}
