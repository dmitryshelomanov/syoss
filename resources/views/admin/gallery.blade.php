@extends('admin.layouts.app')

@section('content')
    @include('admin.common.header')
    <h1>Фото учавствующие в битве на этой неделе</h1>
    <div class="container-flex flex-center">
        <div class="photo-items">
            @foreach($photo as $item)
                <div class="item item-gallery">
                    <div class="like">{{ $item->likes_count }} лайко(ов,а)</div>
                    <div class="user-info">
                        <a href="{{ config('services')['link'][$item->photo->user->provider].$item->photo->user->uid }}" target="_blank">Ссылка на пользователя</a>
                    </div>
                    <img src="{{ route('resize', ['link' => $item->photo->link, 'x' => 225, 'y' => 225]) }}">
                </div>
            @endforeach
        </div>
    </div>
@endsection