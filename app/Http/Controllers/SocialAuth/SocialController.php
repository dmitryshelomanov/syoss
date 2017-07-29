<?php

namespace App\Http\Controllers\SocialAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Socialite;

class SocialController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $provider
     * @return mixed
     * возвращаем провайдер
     */
    public function login($provider)
    {
        return Socialite::with($provider)->redirect();
    }

    /**
     * @param SocialAccountService $service
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     * callback для авторизации
     */
    public function callback(SocialAccountService $service, $provider)
    {
        $driver = Socialite::driver($provider);

        \Auth::login(
            $service->createOrGetUser($driver, $provider), true
        );
        return redirect()->intended('/');
    }
}
