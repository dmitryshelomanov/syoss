@if(count($photo) === 0)
    <div class="no-winners">
        На этой неделе еще не назначили победителей
    </div>
@endif()
@foreach($photo as $item)
    <div class="item">
        <img src="{{ route('resize', ['link' => $item->photo->link, 'x' => 225, 'y' => 225]) }}">
        <img src="img/winner.png" class="fight-flag">
    </div>
@endforeach