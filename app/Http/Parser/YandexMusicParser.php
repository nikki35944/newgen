<?php

namespace App\Http\Parser;


use PHPHtmlParser\Dom;

class YandexMusicParser extends Dom
{

    public function getArtistData(): array
    {
        $artistName = $this->find('.page-artist__title')->innerHtml;
        $listensPerMonth = $this->find('.page-artist__summary')->firstChild()->innerHtml;
        $likesCount = $this->find('.d-like_theme-count .d-button__label')->innerHtml;

        return $artistData = [
            'name' => $artistName,
            'listens_per_month' => $listensPerMonth,
            'likes_count' => $likesCount,

        ];
    }

    public function getAlbumsData($songs, $artist): array
    {
        $albumsData = [];
        foreach ($songs as $song) {
            $albumsData[] = $song['album_name'];
        }

        $uniqueAlbums = array_unique($albumsData);
        $albumsData = [];
        foreach ($uniqueAlbums as $key => $uniqueAlbum) {
            $albumsData[] = [
                'title' => $uniqueAlbum,
                'artist_id' => $artist->id,
            ];
        }

        return $albumsData;
    }

    public function getSongsData($artist) : array
    {

        $contents = $this->find('.d-track');
        $songsData = [];

        foreach ($contents as $content) {
            $title = $content->find('.d-track__title')->innerHtml;
            $duration = $content->find('.d-track__info .typo-track')->innerHtml;
            $albumName = $content->find('.d-track__meta .deco-link')->innerHtml;
            $songsData[] = [
                'title' => $title,
                'duration' => $duration,
                'album_name' => $albumName,
                'artist_id' => $artist->id,
            ];
        }

        return $songsData;
    }

    public function getSongsResultData($songs, $albums)
    {
        $songsResultData = [];
        foreach ($songs as $songData) {
            foreach ($albums as $album) {
                if ($songData['album_name'] == $album->title) {
                    $songData['album_id'] = $album->id;
                }
            }
            unset($songData['album_name']);
            $songsResultData[] = $songData;
        }
        return $songsResultData;
    }
}
