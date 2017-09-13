@foreach($photo as $item)
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