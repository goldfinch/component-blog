<?php

namespace Goldfinch\Component\Blog\Mills;

use Goldfinch\Mill\Mill;

class BlogItemMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
            'Summary' => $this->faker->sentence(2),
            'Content' => $this->faker->paragraph(10),
            'Date' => $this->faker->dateTimeBetween('-8 week')->format('Y-m-d H:i:s'),
            'Publisher' => $this->faker->name(),
        ];
    }
}
