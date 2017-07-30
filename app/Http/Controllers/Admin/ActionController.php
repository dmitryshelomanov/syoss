<?php

namespace App\Http\Controllers\Admin;

use App\Models\Battle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DateHelper;

class ActionController extends Controller
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
     * получить фотку юзера и его чек
     */
    public function getBattle()
    {
        return $this->battle
            ->with(['photo' => function($q) {
                $q->select('id', 'link')
                  ->with('check');
            }])
            ->where([
                ['week', DateHelper::currentStep()],
                ['publish', 0]
            ])
            ->get();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * вывод шаблона
     */
    public function show()
    {
        return view('admin.view', [
            'photo' => $this->getBattle()
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|void
     * принять фотографию
     */
    public function accept($id)
    {
        $update = $this->battle->where('id', $id)
            ->update([
                'publish' => 2
            ]);
        if ($update) {
            return redirect()->back();
        }
        return abort(500);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|void
     * отклонить фотографию
     */
    public function notAccept($id)
    {
        $update = $this->battle->where('id', $id)
            ->update([
                'publish' => 1
            ]);
        if ($update) {
            return redirect()->back();
        }
        return abort(500);
    }
}
