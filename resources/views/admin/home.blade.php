@extends('admin.layouts.app')

@section('content')
    @include('admin.common.header')
    <div class="container-flex flex-center margin-top">
        <div class="photo-items">
            <div class="item info">
                На сайте {{ $userCount }} пользователей
            </div>
            <div class="item info">
                {{ $battleCount }} фотографий на это неделе
            </div>
            <div class="item info">
                текущая неделя - {{ $week }}
            </div>
        </div>
    </div>
@endsection