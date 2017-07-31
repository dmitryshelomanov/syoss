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
                    <div class="play">
                        <i class="fa fa-play fa-2x popupShow" onclick="popup('{{ $item->photo->link }}', {{ $item->photo->like_count_count }})"></i>
                    </div>
                    <img src="{{ route('resize', ['link' => $item->photo->link, 'x' => 225, 'y' => 225]) }}">
                    <div class="social">
                        <a href="https://vk.com/share.php?url={{env('APP_URL')}}gallery&title=Заголовок&image={{ env('APP_URL').$item->photo->link }}" target="_blank">
                            <i class="fa fa-vk fw"></i>
                        </a>
                        <i class="fa fa-odnoklassniki fw"></i>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{env('APP_URL')}}gallery&title=Заголовок&src={{ env('APP_URL').$item->photo->link }}" target="_blank">
                            <i class="fa fa-facebook fw"></i>
                        </a>
                        @include('website.common.likesBlock')
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('website.common.popup')
@endsection