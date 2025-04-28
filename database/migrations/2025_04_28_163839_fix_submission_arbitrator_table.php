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
        // Primero verificamos si la tabla existe
        if (Schema::hasTable('submission_arbitrator')) {
            // Eliminamos la tabla actual para recrearla correctamente
            Schema::dropIfExists('submission_arbitrator');
        }

        // Creamos la tabla con la estructura correcta
        Schema::create('submission_arbitrator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_request_id')->constrained('submission_requests')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('comments')->nullable();
            $table->string('status')->default('pendiente');
            $table->timestamps();

            // Índice para optimizar las búsquedas
            $table->index(['submission_request_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_arbitrator');
    }
};
