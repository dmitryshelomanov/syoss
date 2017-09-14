<div class="filter">
    <h1 class="bottom-line text-center">Фильтр</h1>
    <ul>
        <li @if(request()->order === 'likes') class="active" @endif>
            <a href=" {{ route("gallery", ["order" => "likes", "week" => request()->week]) }}">
                <div>по количеству лайков</div>
            </a>
        </li>
        <li @if(request()->order === 'created' || !request()->order) class="active" @endif>
            <a href="{{ route("gallery", ["order" => "created", "week" => request()->week]) }}">
                <span>по дате загрузки</span>
            </a>
        </li>
    </ul>
</div>