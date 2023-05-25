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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('duration');
            $table->text('album_name');

            $table->timestamps();

            $table->unsignedBigInteger('artist_id');
            $table->index('artist_id', 'artist_song_idx');
            $table->foreign('artist_id', 'artist_song_fk')->on('artists')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
