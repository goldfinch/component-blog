<?php

namespace Goldfinch\Component\Blog\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Component\Blog\Pages\Nest\Blog;
use Goldfinch\Component\Blog\Models\Nest\BlogTag;
use Goldfinch\Component\Blog\Models\Nest\BlogItem;
use Goldfinch\Component\Blog\Models\Nest\BlogCategory;
use Goldfinch\Component\Blog\Pages\Nest\BlogByCategory;

class BlogHarvest extends Harvest
{
    public static function run(): void
    {
        $blogPage = Blog::mill(1)->make([
            'Title' => 'Blog',
            'Content' => '',
        ])->first();

        BlogByCategory::mill(1)->make([
            'Title' => 'Blog by category',
            'Content' => '',
            'ParentID' => $blogPage->ID,
        ]);

        BlogCategory::mill(5)->make();

        BlogTag::mill(5)->make();

        BlogItem::mill(20)->make()->each(function($item) {
            $categories = BlogCategory::get()->shuffle()->limit(rand(0,4));
            $tags = BlogTag::get()->shuffle()->limit(rand(0,6));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }

            foreach ($tags as $tag) {
                $item->Tags()->add($tag);
            }
        });
    }
}
