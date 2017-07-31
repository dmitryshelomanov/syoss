@extends('admin.layouts.app')

@section('content')
    @include('admin.common.header')
    <div class="container-flex flex-center ">
        <div class="photo-items margin-top">
            @foreach($photo as $item)
                <div class="item">
                    <img src="{{ asset($item->photo->link) }}">
                    <img src="{{ asset($item->photo->check->link) }}">
                    <div class="actions">
                        <form action="{{ route('accept', ['id' => $item->id]) }}" method="post">
                            {{ csrf_field() }}
                            <button class="add">
                                принять
                            </button>
                        </form>
                        <form action="{{ route('notaccept', ['id' => $item->id]) }}" method="post">
                            {{ csrf_field() }}
                            <button class="remove">
                                не принимать
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection