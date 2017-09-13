@extends('admin.layouts.app')

@section('content')
    <div class="login-page">
        <div class="form">
            @if ($errors)
                <ul class="error">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach()
                </ul>
            @endif
            <form class="login-form" method="post" action="{{route("admin_login")}}">
                {{csrf_field()}}
                <input type="text" placeholder="email" name="email"/>
                <input type="password" placeholder="пароль" name="password"/>
                <button>войти</button>
            </form>
        </div>
    </div>
@endsection