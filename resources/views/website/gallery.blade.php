@extends('website.layouts.app')

@section('content')
    <div class="container-flex flex-center column-xs">
        <div class="promo">
            <h1>Галлерея работ</h1>
            <span>
                Голосуйте за лучшие образы недели! <br>
                Получите ГИФКУ и примите участие в конкурсе, чтобы выиграть Имидж-book и шоппинг!*
            </span>
        </div>
        @include('website.common.week', ["type" => "week"])
    </div>

    <div class="container-flex column">
        @include("website.common.filter")
        <div class="item-wrapper wrap" id="wrap">
            @if(count($photo) === 0)
                <div style="width: 100%; text-align: center;">
                    фотографий еще нету
                </div>
            @endif
            @foreach($photo as $item)
                <div class="item">
                    <div class="play">
                        <i class="fa fa-play fa-2x popupShow" onclick="popup('{{ $item->photo->link }}', {{ $item->likes_count }})"></i>
                    </div>
                    <img src="{{ route('resize', ['link' => $item->photo->link, 'x' => 225, 'y' => 225]) }}">
                    <div class="social">
                        @include('website.common.link')
                        @include('website.common.likesBlock')
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-flex flex-center">
        <button class="standart" id="more">
            <span>показать еще</span>
        </button>
    </div>

    @include('website.common.popup')
@endsection