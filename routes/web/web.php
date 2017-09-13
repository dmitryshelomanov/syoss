<?php

// главная
Route::get('/', 'Home\HomeController@show');

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

// получить заресайзенную фотку
Route::get('/resize', 'ResizeController@resize')->name('resize');

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
        return view('errors.401');
    })->name('login');
});

// поделиться
Route::get('share', 'ShareController@share');

// посмотреть еще
Route::get('/more', 'Gallery\GalleryController@allPhoto')->name('more');