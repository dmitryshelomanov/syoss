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

    <div class="container-flex container-large">
        <div class="item-wrapper wrapper-large">
            <div class="item item-large pesent-width">
                <h3>романтичная</h3>
                <img src="{{ asset('img/form4.png') }}" alt="">
                <div class="play">
                    <i class="fa fa-play fa-2x"></i>
                </div>
            </div>
            <div class="item item-large pesent-width">
                <h3>стильная</h3>
                <img src="{{ asset('img/form3.png') }}" alt="">
                <div class="play">
                    <i class="fa fa-play fa-2x"></i>
                </div>
            </div>
            <div class="item item-large pesent-width">
                <h3>роковая</h3>
                <img src="{{ asset('img/form2.png') }}" alt="">
                <div class="play">
                    <i class="fa fa-play fa-2x"></i>
                </div>
            </div>
            <div class="item item-large pesent-width">
                <h3>деловая</h3>
                <img src="{{ asset('img/form1.png') }}" alt="">
                <div class="play">
                    <i class="fa fa-play fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container-flex flex-center">
        <button class="standart">
            <span>
                <a href="{{ route('edit') }}">загрузить фото</a>
            </span>
        </button>
    </div>
@endsection