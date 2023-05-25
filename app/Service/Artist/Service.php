<?php

namespace App\Service\Artist;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Support\Facades\DB;

class Service
{
    public function exists($artistData)
    {
        $artist = Artist::where('name', $artistData['name'])->first();

        return $artist && $artist->exists;
    }


}
