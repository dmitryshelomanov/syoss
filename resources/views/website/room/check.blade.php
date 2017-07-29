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

    <div class="container-flex flex-center margin-bottom-x3">
        <div class="item-wrapper wrap">
            <div class="item">
                <img src="{{ asset('img/syoss.png') }}" class="fight-flag">
                <img src="{{ asset('img/300.png')}}">
                <div class="social">
                    <i class="fa fa-vk fw"></i>
                    <i class="fa fa-odnoklassniki fw"></i>
                    <i class="fa fa-facebook fw"></i>
                    <span>
                        <i class="fa fa-heart fw"></i> лайк 24
                    </span>
                </div>
                <button class="standart check">
                    <span>скачать</span>
                </button>
            </div>

            <div class="item">
                <img src="{{ asset('img/300.png') }}">
            </div>

            <div class="item">
                <img src="{{ asset('img/300.png') }}">
            </div>

            <div class="item">
                <img src="{{ asset('img/300.png') }}">
            </div>
        </div>
    </div>
@endsection