<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $text = fake()->realText(1000);
        $announce = Str::limit($text, 200);
        return [
            'title' => $this->faker->realText(50),
            'announce' => $announce,
            'text' => $text,
        ];
    }
}
