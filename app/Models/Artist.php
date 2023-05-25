<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function songs()
    {
        return $this->hasMany(Artist::class, 'artist_id', 'id');
    }
}
