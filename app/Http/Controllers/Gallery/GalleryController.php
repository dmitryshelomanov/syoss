<?php

namespace App\Http\Controllers\Gallery;

use App\Models\Battle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DateHelper;
use App\Helpers\AjaxRender;

class GalleryController extends Controller
{
    public $battle;
    public $request;
    private $ajaxRender;

    public function __construct(Battle $battle, Request $request, AjaxRender $ajaxRender)
    {
        $this->battle = $battle;
        $this->request = $request;
        $this->ajaxRender = $ajaxRender;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * Получить все фотки + лайки от юзера авторизированного
     */
    public function allPhoto($skip = 0, $take = 10, $current = true, $week = 1)
    {
        $data = $this->battle
            ->photoInfo()
            ->withCount('likes')
            ->withCount('winners')
            ->orderBy($this->request->order === 'likes' ? 'likes_count' : 'id', 'desc')
            ->published($current, $week)
            ->skip($this->request->skip ? $this->request->skip : $skip)
            ->take($this->request->take ? $this->request->take : $take)
            ->get();

        if ($this->request->ajax()) {
            return response()->json(
                $this->ajaxRender->render($data, $this->request->layout)
            );
        }
        return $data;
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
