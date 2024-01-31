<?php

namespace Goldfinch\Component\Blog\Mills;

use Goldfinch\Mill\Mill;

class BlogItemMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(),
            'Summary' => $this->faker->sentence(2),
            'Content' => $this->faker->paragraph(10),
            'Date' => $faker->dateTimeBetween('-4 week', '+4 week')->format('Y-m-d H:i:s'),
            'Author' => $this->faker->name(),
        ];
    }
}
