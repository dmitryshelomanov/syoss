<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Battle;
use DateHelper;
use Auth;
use Mobile_Detect as Detection;

class HomeController extends Controller
{
    private $battle;
    private $detect;

    public function __construct(Battle $battle, Detection $detect)
    {
        $this->battle = $battle;
        $this->detect = $detect;
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

    public function getWinner()
    {
        return $this->battle
                ->where('winner', 1)
                ->photoInfo()
                ->get();
    }

    public function show()
    {
        if ($this->detect->isMobile()) {
            return "this is mobile version";
        }
        return view('website.home', [
            'photo' => $this->getLastPhoto(8),
            'winners' => $this->getWinner()
        ]);
    }
}