<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function songs()
    {
        return $this->hasMany(Album::class, 'album_id', 'id');
    }
    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }
}
