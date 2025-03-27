<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
        $isbn = $this->faker->unique()->isbn13;

        // Create a sample PDF file for the book
        $pdfPath = "libros/{$isbn}.pdf";

        // Ensure the libros directory exists
        if (!Storage::exists('public/libros')) {
            Storage::makeDirectory('public/libros');
        }

        // Create a simple PDF file with the ISBN as content
        if (!Storage::exists("public/{$pdfPath}")) {
            $pdfContent = "Sample PDF for book with ISBN: {$isbn}";
            Storage::put("public/{$pdfPath}", $pdfContent);
        }

        return [
            'title' => $this->faker->sentence,
            'isbn' => $isbn,
            'publication_date' => $this->faker->date,
            'edition' => $this->faker->word,
            'partner' => $this->faker->company,
            'volume' => $this->faker->optional()->numberBetween(1, 10),
            'pages' => $this->faker->optional()->numberBetween(50, 1000),
            'description' => $this->faker->optional()->paragraph,
            'cover' => $this->faker->optional()->imageUrl(640, 480, 'books'),
            'pdf_path' => $pdfPath,
        ];
    }
}
