@if ($item->photo->likes)
    <span class="opacity" onclick="setLike('/unSetLike', {{ $item->photo->id }})">
        <i class="fa fa-heart fw unSetLike" ></i> лайки {{ $item->photo->like_count_count }}
    </span>
@else
    <span onclick="setLike('/setLike', {{ $item->photo->id }})">
        <i class="fa fa-heart fw setLike"></i> лайки {{ $item->photo->like_count_count }}
    </span>
@endif