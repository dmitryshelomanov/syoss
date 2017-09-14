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
        @include('website.common.week', ["type" => "room"])
    </div>
    @cannot('check', Auth::user())
        <div class="container-flex">
            <div class="alert text-danger bg-danger">
                Вы не можете загрузить изображение на этой неделе!
            </div>
        </div>
    @endcannot
    @can('check', Auth::user())
        <div class="container-flex column full-size">
            <div class="canvas-wrapper">
                <div>
                    <img id="image" class="canvas">
                    <div class="hidden">
                        <input type="file" id="edit">
                    </div>
                </div>
                <div class="control">
                    <select id="animation">
                        @foreach(config("services")["animation"] as $key => $value)
                            <option value="/img/animation/{{ $value }}">{{ $key }}</option>
                        @endforeach
                    </select>
                    <div class="group">
                        <label for="name">ваше имя</label>
                        <input type="text" id="name">
                    </div>
                    <div class="group">
                        <button class="standart" id="upload">
                            <span>готово</span>
                        </button>
                    </div>
                    <div class="group">
                        <button class="standart" id="capture-edit">
                            <span>выбрать фото</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection