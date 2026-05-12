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

        // Copy a simple valid PDF file instead of creating corrupted text 
        if (!Storage::exists("public/{$pdfPath}")) {
            if (Storage::exists("public/dummy.pdf")) {
                Storage::copy("public/dummy.pdf", "public/{$pdfPath}");
            } else {
                // Creates minimal valid PDF structure just in case the dummy was not downloaded
                $minimalPdf = "%PDF-1.4\n1 0 obj\n<< /Type /Catalog /Pages 2 0 R >>\nendobj\n2 0 obj\n<< /Type /Pages /Kids [3 0 R] /Count 1 >>\nendobj\n3 0 obj\n<< /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] >>\nendobj\nxref\n0 4\n0000000000 65535 f\n0000000009 00000 n\n0000000058 00000 n\n0000000115 00000 n\ntrailer\n<< /Size 4 /Root 1 0 R >>\nstartxref\n188\n%%EOF";
                Storage::put("public/{$pdfPath}", $minimalPdf);
            }
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
