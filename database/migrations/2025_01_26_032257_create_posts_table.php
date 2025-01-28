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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('author_id')
                ->constrained('users', 'id')
                ->unique()
                ->nullable();
            $table->string('title', 100)->default('Untitled');
            $table->text('content')->nullable();
            $table->foreignId('category_id')
                ->constrained('categories', 'id')
                ->unique()
                ->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
