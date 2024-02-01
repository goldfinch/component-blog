<?php

namespace Goldfinch\Component\Blog\Models\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use SilverStripe\ORM\FieldType\DBHTMLText;
use Goldfinch\Component\Blog\Pages\Nest\Blog;

class BlogTag extends NestedObject
{
    use FielderTrait, Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = null;
    public static $nest_down_parents = [];

    private static $table_name = 'BlogTag';
    private static $singular_name = 'tag';
    private static $plural_name = 'tags';

    private static $db = [];

    private static $belongs_many_many = [
        'Items' => BlogItem::class,
    ];

    private static $summary_fields = [
        'Items.Count' => 'Articles',
    ];

    private static $settings_tab = false;

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->string('URLSegment')->setDescription('auto-generated based on title'),
            ],
        ]);
    }

    public function HTMLLink()
    {
        $html = DBHTMLText::create();

        $blog = Blog::get()->first();

        if ($blog) {
            $link = $this->Link($blog->Link());

            $html->setValue(
                '<a onclick="event.stopPropagation();" target="_blank" href="' .
                    $link .
                    '">' .
                    $this->URLSegment .
                    '</a>',
            );
        } else {
            $html->setValue('-');
        }

        return $html;
    }

    public function Link($parentLink = null)
    {
        if (!$parentLink) {
            $blog = Blog::get()->first();

            $parentLink = $blog->Link();
        }

        return $parentLink . '?tag=' . $this->URLSegment;

    }
}
