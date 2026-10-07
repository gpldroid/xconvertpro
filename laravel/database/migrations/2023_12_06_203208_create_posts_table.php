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
            $table->string('title', 60);
            $table->string('metaDescription', 155);
            $table->string('metaKeywords')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('snippet');
            $table->boolean('topAd')->nullable();
            $table->boolean('bottomAd')->nullable();
            $table->boolean('showShareButtons')->nullable();
            $table->longText('content');
            $table->string('slug')->unique();
            $table->date('published_at')->nullable();
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
