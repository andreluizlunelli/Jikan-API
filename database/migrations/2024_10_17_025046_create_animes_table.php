<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->integer('mal_id');
            $table->string('url');
            $table->string('title');
            $table->string('type');
            $table->string('source');
            $table->string('status');
            $table->integer('episodes');
            $table->string('duration');
            $table->string('rating');
            $table->float('score');
            $table->integer('popularity');
            $table->dateTimeTz('aired_from');
            $table->dateTimeTz('aired_to');
            $table->text('synopsis');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
