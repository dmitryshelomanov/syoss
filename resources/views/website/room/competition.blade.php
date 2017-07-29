@extends('website.layouts.app')

@section('content')
    <div class="container-flex flex-center column-xs">
        <div class="promo">
            <h1>Личный кабинет</h1>
            <span>
                Примите участие в конкурсе SYOSS! <br>
                Загрузите чек, опубликуйте свое фото и получите стильный приз!
            </span>
        </div>
        @include('website.common.week')
    </div>

    <div class="container-flex flex-center">
        <div class="item-wrapper wrap">
            @foreach($photo as $item)
                <div class="item">
                    <img src="{{ asset($item->link) }}">
                    <div class="radio-group">
                        <input type="radio" class="radio" id="radio{{ $item->id }}" name="checked"/>
                        <label for="radio{{ $item->id }}"></label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-flex flex-center">
        <button class="standart margin-bottom">
            <span>загрузить чек</span>
        </button>
    </div>
@endsection