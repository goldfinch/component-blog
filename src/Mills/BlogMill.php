<?php

namespace Goldfinch\Component\Blog\Mills;

use Goldfinch\Mill\Mill;

class BlogMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
            'Content' => $this->faker->paragraph(20),
        ];
    }
}
