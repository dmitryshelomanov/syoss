<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="srf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('js/vendore/fullpage/jquery.fullPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/vendore/fullpage/jquery.fullPage.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendore/cropper.js') }}"></script>
    <script src="{{ asset('js/cropper.js') }}"></script>
</head>
<body>
@include('website.common.loader')
@include('website.common.header')

@yield('content')

@include('website.common.footer')

<div class="alert-success"></div>
<div class="alert-error"></div>