<?php

namespace App\Http\Controllers\Gallery;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    private
        $photo,
        $request;

    public function __construct(Photo $photo, Request $request)
    {
        $this->photo = $photo;
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * Получить все фотки + лайки от юзера авторизированного
     */
    public function allPhoto()
    {
        return $this->photo
            ->with(['likes' => function($q) {
                $q->select('photo_id', 'user_id')
                  ->where('user_id', Auth::user() ? Auth::user()->id : 0);
            }])
            ->withCount('likeCount')
            ->get();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * вывести шаблон
     */
    public function show()
    {
        return view('website.gallery', [
            'photo' => $this->allPhoto()
        ]);
    }
}
