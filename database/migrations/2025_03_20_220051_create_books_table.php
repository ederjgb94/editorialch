<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('isbn', 20)->unique();
            $table->date('publication_date');
            $table->string('edition', 50);
            $table->string('partner', 255);
            $table->integer('volume')->nullable();
            $table->integer('pages')->nullable();
            $table->text('description')->nullable();
            $table->string('cover', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
