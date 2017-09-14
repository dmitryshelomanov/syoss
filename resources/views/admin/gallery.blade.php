@extends('admin.layouts.app')

@section('content')
    @include('admin.common.header')
    <h1>Фото учавствующие в битве на этой неделе</h1>
    <a href="#" id="more" data-week="{{ request()->week }}">Показать еще</a>
    <div class="week">
        <div>Неделя</div>
        <div>
            <a href="?week=1" @if(DateHelper::currentStep() === 1) class="active" @endif>1</a>
            <a href="?week=2" @if(DateHelper::currentStep() === 2) class="active" @endif>2</a>
            <a href="?week=3" @if(DateHelper::currentStep() === 3) class="active" @endif>3</a>
            <a href="?week=4" @if(DateHelper::currentStep() === 4) class="active" @endif>4</a>
        </div>
    </div>
    @php $increment = 0; @endphp
    @if($increment === 3)
        <div class="alert text-danger bg-danger">
            Вы не можете назначить больше победителей на данной неделе (максимум 3)
        </div>
    @endif
    <div class="container-flex flex-center">
        <div class="photo-items">
            @foreach($photo as $item)
                @php $increment = $item->winners_count; @endphp
                <div class="item item-gallery">
                    <div class="like">{{ $item->likes_count }} лайко(ов,а)</div>
                    <div class="user-info" style="bottom: -45px">
                        <a href="{{ config('services')['link'][$item->photo->user->provider].$item->photo->user->uid }}" target="_blank">Ссылка на пользователя</a>
                        @if ($item->winner)
                            <form action="{{ route('removeWinner') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="default">Удалить победителя</button>
                            </form>
                        @elseif ($item->winners_count !== 3 && !$item->winner)
                            <form action="{{ route('setWinner') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="default">Назначить победителем</button>
                            </form>
                        @endif
                    </div>
                    <img src="{{ route('resize', ['link' => $item->photo->link, 'x' => 225, 'y' => 225]) }}">
                    @if ($item->winner)
                        <img src="{{ asset('img/winner.png') }}" class="winner">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection