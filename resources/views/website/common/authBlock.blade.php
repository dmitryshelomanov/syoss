<div class="auth-block" class="{{ URL::current() ===  env('APP_URL') ? 'fixed' : '' }}">
    <ul class="auth">
        <img src="{{ \Auth::user()->avatar }}">
        {{ \Auth::user()->name }}
        <form action="{{ route('logout') }}" method="post">
            {{ csrf_field() }}
            <button>выход</button>
        </form>
        <a href="{{ route('room') }}">личный кабинет</a>
        @if(\Auth::user()->role === 1)
            <a href="{{ route('adminView') }}">админка</a>
        @endif()
    </ul>
</div>