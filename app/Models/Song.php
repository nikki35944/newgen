<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }

    public function albums()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}
