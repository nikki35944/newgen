<?php

namespace App\Http\Controllers;

use App\Http\Requests\Song\StoreRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use App\Service\CurlClient;
use Illuminate\Support\Facades\DB;
use PHPHtmlParser\Dom;
use App\Http\Parser\YandexMusicParser;

class HomeController extends BaseController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function store(StoreRequest $request, YandexMusicParser $parser)
    {
        $data = $request->validated();

        $dom = $parser->loadFromUrl($data['yandexMusicUrl'], [], new CurlClient());
        $artistData = $dom->getArtistData();

        if ($this->service->exists($artistData)) return redirect()->route('home')->with('error_message', 'Исполнитель уже есть в базе');


        $artist = Artist::firstOrCreate($artistData);
        $songsData = $dom->getSongsData($artist);

        $albumsData = $dom->getAlbumsData($songsData, $artist);
        DB::table('albums')->insert($albumsData);

        $albums = Album::with('artist')->get();

        $songsResultData = $dom->getSongsResultData($songsData, $albums);
        DB::table('songs')->insert($songsResultData);

        return redirect()->route('home')->with('message', 'Данные успешно добавлены в базу');
    }
}
