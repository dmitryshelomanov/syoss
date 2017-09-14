<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Battle;
use Illuminate\Http\Request;
use Mobile_Detect as Detection;
use DateHelper;
use Auth;

class HomeController extends Controller
{
    private $battle;
    private $detect;
    private $request;

    public function __construct(Battle $battle, Detection $detect, Request $request)
    {
        $this->battle = $battle;
        $this->detect = $detect;
        $this->request = $request;
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
                ->where([
                    ['winner', 1],
                    ['week', DateHelper::currentStep()]
                ])
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