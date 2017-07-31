<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Battle;
use DateHelper;
use Auth;

class HomeController extends Controller
{
    private $battle;

    public function __construct(Battle $battle)
    {
        $this->battle = $battle;
    }

    public function getLastPhoto($count)
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
            ->limit($count)
            ->get();
    }

    public function show()
    {
        return view('website.home', [
            'photo' => $this->getLastPhoto(8)
        ]);
    }
}