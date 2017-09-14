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
        @include('website.common.week', ["type" => "room"])
    </div>
    <form action="/room/check/upload" method="post" style="width: 100%" enctype="multipart/form-data">
    <div class="container-flex flex-center">
        <div class="item-wrapper wrap">
            @foreach($photo as $item)
                <div class="item">
                    <img src="{{ asset($item->link) }}">
                    @if($item->battle)
                        <img src="{{ asset('img/syoss.png') }}" class="fight-flag">
                        <div class="message-moderate">
                            {{ config('services')['moderate'][$item->battle->publish] }}
                            @if ($item->battle->publish === 2)
                                <button class="standart flex-center" type="button">
                                    <span>скачать чек</span>
                                </button>
                            @elseif ($item->battle->publish === 1)
                                <form action="{{ route('reCompetition') }}" method="post" id="reCompetition">
                                    {{ csrf_field() }}
                                    <button class="standart flex-center" type="button" id="reCompetitionSub">
                                        <span>загрузить новое</span>
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endif
                    @can('check', 'App\Models\Battle')
                        <div class="radio-group">
                            <input type="radio" class="radio" id="radio{{ $item->id }}" name="checked" value="{{ $item->id }}" checked/>
                            <label for="radio{{ $item->id }}"></label>
                        </div>
                    @endcan
                </div>
            @endforeach
        </div>
    </div>

    @can('check', 'App\Models\Battle')
        <div class="container-flex flex-center">
            {{ csrf_field() }}
            <button class="standart margin-bottom" type="submit">
                <span>загрузить чек</span>
            </button>
            <button class="standart margin-bottom" id="capture" type="button">
                <span>выбрать чек</span>
            </button>
            <input type="file" class="hidden" id="files" name="check">
        </div>
        </form>
    @endcan
@endsection