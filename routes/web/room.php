<?php
//кабинет главная
Route::get('/index', function () {
    return view('website.room.index');
})->name('room');

// редактирование фото
Route::get('/edit', function () {
    return view('website.room.edit');
})->name('edit');

// просмотр своих фото по неделям
Route::middleware('CheckStep')->get('/view', 'Room\ViewController@show')->name('view');

// принять участие в конкурсе
Route::get('/competition', 'Room\CompetitionController@show')->name('competition');

// проверить фото
Route::get('/check', function () {
    return view('website.room.check');
});

// загрузить фото
Route::post('/photo/upload', 'Upload\PhotoUploadController@upload');
