<header class="{{ URL::current() ===  env('APP_URL') ? 'fixed' : '' }}">

    @include('website.common.topMenu')

    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>
</header>

<div class="open-menu">
    <i class="fa fa-list fw"></i>
    <i class="fa fa-close fw" style="display: none"></i>
</div>
<div class="mobile-menu">
    <ul>
        <li>Главная</li>
        <li class="active">галерея работ</li>
        <li>полные правила</li>
        <li>победители</li>
        <li>
            <i class="fa fa-vk fw"></i>
            <i class="fa fa-odnoklassniki fw"></i>
            <i class="fa fa-facebook fw"></i>
        </li>
    </ul>
</div>
@if (\Auth::check())
    @include('website.common.authBlock')
@else
    @include('website.common.notAuthBlock')
@endif