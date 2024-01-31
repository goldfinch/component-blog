<?php

namespace Goldfinch\Component\Blog\Mills;

use Goldfinch\Mill\Mill;

class BlogCategoryMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(5),
        ];
    }
}
