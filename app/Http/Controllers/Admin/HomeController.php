<?php

namespace App\Http\Controllers\Admin;

use App\Models\Battle;
use App\Http\Controllers\Controller;
use DateHelper;
use App\Models\Users\User;

class HomeController extends Controller
{
    /**
     * @return int
     * кол-во юзеров
     */
    public function userCount()
    {
        return User::count();
    }

    /**
     * @return int
     * кол-во фоток в битве
     */
    public function battleCount()
    {
        return Battle::where('week', DateHelper::currentStep())->count();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * просмотр
     */
    public function show()
    {
        return view('admin.home', [
            'week' => DateHelper::currentStep(),
            'userCount' => $this->userCount(),
            'battleCount' => $this->battleCount()
        ]);
    }
}
