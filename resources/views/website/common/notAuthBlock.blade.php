<div class="auth-block" class="{{ URL::current() ===  env('APP_URL') ? 'fixed' : '' }}">
    <ul>
        <li>
            <a href="{{ route('social', ['provider' => 'vkontakte']) }}">
                <i class="fa fa-vk fw"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('social', ['provider' => 'odnoklassniki']) }}">
                <i class="fa fa-odnoklassniki fw"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('social', ['provider' => 'facebook']) }}">
                <i class="fa fa-facebook fw"></i>
            </a>
        </li>
    </ul>
</div>