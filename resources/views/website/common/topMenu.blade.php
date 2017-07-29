<ul class="top-menu" id="menu">
    <li class="{{ URL::current() === env('APP_URL') ? 'active' : '' }}">
        <a href="/">Главная</a>
    </li>
    <li class="{{ URL::current() === env('APP_URL')."/gallery" ? 'active' : '' }}">
        <a href="{{ route('gallery') }}">галерея работ</a>
    </li>
    <li class="{{ URL::current() === env('APP_URL')."/rules" ? 'active' : '' }}">
        <a href="{{ route('rules') }}">полные правила </a>
    </li>
    <li>
        <a >победители</a>
    </li>
</ul>