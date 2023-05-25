@extends('layouts.main')

@section('content')
    @include('includes.alert')

    <form method="POST" action="{{ route('song.store') }}">
        @csrf
        <div class="mb-3">
            <label for="yandexMusicUrl" class="form-label">Вставьте ссылку вида <span class="text-decoration-underline"> https://music.yandex.ru/artist/36800/tracks </span></label>
            <input type="url" name="yandexMusicUrl" class="form-control" id="yandexMusicUrl" >
            @error('yandexMusicUrl')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Получить данные</button>
    </form>

@endsection
