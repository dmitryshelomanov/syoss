@if ($item->likes)
    <span class="opacity" onclick="setLike('/unSetLike', {{ $item->id }})">
        <i class="fa fa-heart fw unSetLike" ></i> лайки {{ $item->like_count_count }}
    </span>
@else
    <span onclick="setLike('/setLike', {{ $item->id }})">
        <i class="fa fa-heart fw setLike"></i> лайки {{ $item->like_count_count }}
    </span>
@endif