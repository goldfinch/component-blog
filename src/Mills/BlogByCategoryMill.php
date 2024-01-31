<?php

namespace Goldfinch\Component\Blog\Mills;

use Goldfinch\Mill\Mill;

class BlogByCategoryMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(3),
            'Content' => $this->faker->paragraph(20),
        ];
    }
}
