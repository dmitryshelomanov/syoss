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
            ->photoInfo()
            ->withCount('likes')
            ->published()
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