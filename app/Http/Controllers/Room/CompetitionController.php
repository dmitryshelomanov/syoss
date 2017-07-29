<?php

namespace App\Http\Controllers\Room;

use App\Facades\DateHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo;

class CompetitionController extends Controller
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
        return view('website.room.competition', [
            'photo' => $this->getPhotoForCompetition()
        ]);
    }

    public function getPhotoForCompetition()
    {
        return $this->photo->where([
            ['user_id', $this->request->user()->id],
            ['week', DateHelper::currentStep()]
        ])->get(['id', 'link']);
    }
}
