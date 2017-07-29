@extends('website.layouts.app')

@section('content')
    <div class="container-flex flex-center column-xs">
        <div class="promo">
            <h1>Личный кабинет</h1>
            <span>
                Загрузите свое фото и получите персональную гифку! <br>
                Выберите образ, который подходит именно Вам!
            </span>
        </div>
        @include('website.common.week')
    </div>

    <div class="container-flex flex-center">
        <div class="item-wrapper wrap">
            @foreach($photo as $item)
                <div class="item">
                    <img src="{{ asset($item->link) }}">
                </div>
            @endforeach
            @for($i = count($photo); $i < 4; $i++)
                <div class="item upload-more">
                    <a href="{{ route('edit') }}">
                        <img src="{{ asset('img/upload.png') }}">
                    </a>
                </div>
            @endfor
        </div>
    </div>

    <div class="container-flex flex-center">
        <button class="standart margin-bottom">
            <span>
                <a href="{{ route('competition') }}">принять участие в конкурсе</a>
            </span>
        </button>
    </div>
@endsection