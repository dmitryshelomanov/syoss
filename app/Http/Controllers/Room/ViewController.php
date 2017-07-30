<?php

namespace App\Http\Controllers\Room;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo;

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
                $this->request->week  ? $this->request->week  : 1
            )
        ]);
    }

    public function getPhotoForWeek($week)
    {
        return $this->photo->where([
            ['user_id', $this->request->user()->id],
            ['week', $week]
        ])
        ->with(['battle' => function($q) {
            $q->select('id', 'photo_id');
        }])
        ->get(['id', 'link']);
    }
}
