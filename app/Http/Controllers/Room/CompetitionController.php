<?php

namespace App\Http\Controllers\Room;

use App\Facades\DateHelper;
use App\Models\Battle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo;

class CompetitionController extends Controller
{
    private $photo;
    private $request;
    private $battle;

    public function __construct(Photo $photo, Request $request, Battle $battle)
    {
        $this->photo = $photo;
        $this->request = $request;
        $this->battle = $battle;
    }


    public function show()
    {
        return view('website.room.competition', [
            'photo' => $this->getPhotoForCompetition()
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|void
     * принять повторно участие
     */
    public function reCompetition()
    {
        $rs = $this->battle->reCompetition(
          $this->request->user()
        );
        if ($rs) {
            return redirect()->back();
        }
        return abort(500);
    }

    public function getPhotoForCompetition()
    {
        return $this->photo
            ->whereUser($this->request)
            ->withBattle()
            ->get(['id', 'link']);
    }
}
