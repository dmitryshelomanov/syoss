<?php

namespace App\Http\Controllers\Gallery;

use App\Models\Battle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DateHelper;

class GalleryController extends Controller
{
    private
        $battle,
        $request;

    public function __construct(Battle $battle, Request $request)
    {
        $this->battle = $battle;
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * Получить все фотки + лайки от юзера авторизированного
     */
    public function allPhoto()
    {
        return $this->battle
            ->with(['photo' => function($q) {
                $q->with(['likes' => function($q) {
                    $q->select('id', 'photo_id', 'user_id')
                      ->where('user_id', Auth::user() ? Auth::user()->id : 0);
                }])
                ->withCount('likeCount');
            }])
            ->where([
                ['week', DateHelper::currentStep()],
                ['publish', 2]
            ])
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
