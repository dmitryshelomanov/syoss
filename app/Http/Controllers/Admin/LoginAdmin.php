<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\User;
use Validator;

class LoginAdmin extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Авторизация админа
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request) {
        $validator = $this->validateData($request->all());
        if (!$validator->fails()) {
            $user = $this->checkUser($request->email, $request->password);
            if ($user) {
                Auth::login($user, true);
                return redirect("/admin/view");
            }
            return redirect()->back()->withErrors("Не правильный логин или пароль");
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * валидация
     * @param $request
     * @return bool
     */
    public function validateData($request) {
        return Validator::make($request, [
            "email" => "required"
        ]);
    }

    /**
     * проверка юзера в бд
     * @param $email
     * @param $password
     * @return bool|mixed
     */
    public function checkUser($email, $password) {
        return $this->user->where([
            "email" => $email,
            "password" => $password
        ])->first();
    }
}
