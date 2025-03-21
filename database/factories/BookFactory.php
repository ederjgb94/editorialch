<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'isbn' => $this->faker->unique()->isbn13,
            'publication_date' => $this->faker->date,
            'edition' => $this->faker->word,
            'partner' => $this->faker->company,
            'volume' => $this->faker->optional()->numberBetween(1, 10),
            'pages' => $this->faker->optional()->numberBetween(50, 1000),
            'description' => $this->faker->optional()->paragraph,
            'cover' => $this->faker->optional()->imageUrl(640, 480, 'books'),
        ];
    }
}
