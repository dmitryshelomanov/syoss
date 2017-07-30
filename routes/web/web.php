<?php
Route::middleware('start')->group(function() {

    // главная
    Route::get('/', function () {
        return view('website.home');
    });

    // галлерея
    Route::get('/gallery', 'Gallery\GalleryController@show')->name('gallery');

    // правила
    Route::get('/rules', function () {
        return view('website.rules');
    })->name('rules');

    // поставить лайк
    Route::middleware('auth')->group(function() {
        Route::post('/setLike', 'Likes\LikesController@setLike');
        Route::post('/unSetLike', 'Likes\LikesController@unSetLike');
    });

});

// страница ожидания
Route::get('/wait', function () {
    echo 'waiting please application does not ready !';
});

// страница приложения закрытого
Route::get('/close', function () {
    echo 'The application is buried !';
});

Route::middleware('guest')->group(function() {

    // страница аворизации
    Route::get('/login', function () {
        echo 'для доступа в этот раздел нужна авторизация';
    })->name('login');

    // страница логина админа
    Route::get('admin/login', function() {
        return view('admin.login');
    });
});

