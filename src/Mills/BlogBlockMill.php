<?php

namespace Goldfinch\Component\Blog\Mills;

use Goldfinch\Mill\Mill;

class BlogBlockMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
