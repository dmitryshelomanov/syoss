<?php
/**
 * Created by PhpStorm.
 * User: Анатолий
 * Date: 31.07.2017
 * Time: 12:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Gallery\GalleryController;

class PhotoController extends GalleryController
{
    public function show()
    {
        return view('admin.gallery', [
            'photo' => $this->allPhoto()
        ]);
    }
}