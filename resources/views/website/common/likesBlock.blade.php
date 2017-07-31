<span class="opacity" id="unSetLike{{ $item->photo->id  }}"  style="{{ !$item->photo->likes ? 'display: none' : 'display: block' }}" onclick="removeLike({{ $item->photo->id }}, this)">
    <i class="fa fa-heart fw"></i> лайк(и) <like>{{ $item->photo->like_count_count }}</like>
</span>
<span  id="setLike{{ $item->photo->id  }}" style="{{ !$item->photo->likes ? 'display: block' : 'display: none' }}" onclick="addLike({{ $item->photo->id }}, this)">
    <i class="fa fa-heart fw"></i> лайк(и) <like>{{ $item->photo->like_count_count }}</like>
</span>