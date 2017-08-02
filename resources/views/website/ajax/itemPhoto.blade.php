@foreach($photo as $item)
    <div class="item">
        <div class="play">
            <i class="fa fa-play fa-2x popupShow" onclick="popup('{{ $item->photo->link }}', {{ $item->likes_count }})"></i>
        </div>
        <img src="{{ route('resize', ['link' => $item->photo->link, 'x' => 225, 'y' => 225]) }}">
        <div class="social">
            @include('website.common.link')
            @include('website.common.likesBlock')
        </div>
    </div>
@endforeach