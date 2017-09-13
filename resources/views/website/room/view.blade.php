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
            @php $param = 0; @endphp
            @foreach($photo as $item)
                <div class="item">
                    <img src="{{ asset($item->link) }}">
                    @if($item->battle)
                        <img src="{{ asset('img/syoss.png') }}" class="fight-flag">
                    @endif
                </div>
                @php
                    if (isset($item->battle)) {
                        $param = 1;
                    }
                @endphp
            @endforeach
            @for($i = count($photo); $i < 4; $i++)
                @if($param === 0 && request()->week != DateHelper::currentStep())
                    <div class="item upload-more">
                        на данно неделе уже нельзя загрузить фото
                    </div>
                @elseif ($param === 0)
                    <div class="item upload-more">
                        <a href="{{ route('edit') }}">
                            <img src="{{ asset('img/upload.png') }}">
                        </a>
                    </div>
                @else
                    <div class="item upload-more">
                        <img src="{{ asset('img/notupload.png') }}">
                    </div>
                @endif
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