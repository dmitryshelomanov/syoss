<?php
Route::middleware(['auth', 'Admin'])->group(function() {

    Route::get('/', 'Admin\HomeController@show');
    Route::get('/view', 'Admin\ActionController@show')->name('adminView');
    // подтиверидть участие
    Route::post('/accept/{id}', 'Admin\ActionController@accept')->name('accept');
    // не подтиверждать участие
    Route::post('/notaccept/{id}', 'Admin\ActionController@notAccept')->name('notaccept');

    Route::get('/photo', 'Admin\PhotoController@show')->name('photo');

    // просмотр фото и чека
    Route::get('review', function() {
        return view('admin.review');
    });

    // удалить победителя
    Route::post('/removeWinner', 'Admin\PhotoController@removeWinner')->name('removeWinner');

    // назначить победителя
    Route::post('/setWinner', 'Admin\PhotoController@setWinner')->name('setWinner');

});

Route::middleware(['guest'])->group(function() {
    // страница логина админа
    Route::get('/login', function() {
        return view('admin.login');
    });

    // страница логина админа
    Route::post('/login', 'Admin\LoginAdmin@login')->name("admin_login");
});