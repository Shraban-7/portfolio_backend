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
        Schema::create('hero_herosubtitles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hero_id')->constrained()->cascadeOnDelete();
            $table->foreignId('hero_sub_title_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_herosubtitles');
    }
};
