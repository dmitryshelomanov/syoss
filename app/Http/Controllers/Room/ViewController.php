<?php

namespace App\Http\Controllers\Room;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use DateHelper;

class ViewController extends Controller
{
    private $photo;
    private $request;

    public function __construct(Photo $photo, Request $request)
    {
        $this->photo = $photo;
        $this->request = $request;
    }

    public function show()
    {
        return view('website.room.view', [
            'photo' => $this->getPhotoForWeek(
                $this->request->week ? $this->request->week : \DateHelper::currentStep()
            )
        ]);
    }

    public function getPhotoForWeek($week)
    {
        return $this
                ->photo
                ->whereUser($this->request, $week)
                ->withBattle()
                ->get(['id', 'link']);
    }
}
