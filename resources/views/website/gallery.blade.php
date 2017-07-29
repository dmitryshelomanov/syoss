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
        @include('website.common.week')
    </div>

    <div class="container-flex column">
        <div class="filter">
            <h1 class="bottom-line text-center">Фильтр</h1>
            <ul>
                <li class="active">
                    <div>по количеству лайков</div>
                </li>
                <li>
                    <span>по дате загрузки</span>
                </li>
            </ul>
        </div>
        <div class="item-wrapper wrap">
            @foreach($photo as $item)
                <div class="item">
                    <img src="{{ asset($item->link) }}">
                    <div class="play">
                        <i class="fa fa-play fa-2x"></i>
                    </div>
                    <div class="social">
                        <i class="fa fa-vk fw"></i>
                        <i class="fa fa-odnoklassniki fw"></i>
                        <i class="fa fa-facebook fw"></i>
                        @include('website.common.likesBlock')
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{--<div class="popup-wrapper">--}}
        {{--<div class="popup-inner">--}}
            {{--<div class="close">--}}
                {{--<i class="fa fa-close fa-2x"></i>--}}
            {{--</div>--}}
            {{--<img src="img/popup.png" alt="">--}}
            {{--<div class="popup-footer">--}}
                {{--<div>--}}
                    {{--<i class="fa fa-vk fa-2x"></i>--}}
                    {{--<i class="fa fa-odnoklassniki fa-2x"></i>--}}
                    {{--<i class="fa fa-facebook fa-2x"></i>--}}
                {{--</div>--}}
                {{--<div>--}}
                    {{--<i class="fa fa-heart fa-2x"></i> <span>лайк 24 </span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection