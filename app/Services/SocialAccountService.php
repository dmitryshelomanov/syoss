<?php

namespace App\Services;

use App\Models\Users\User;

class SocialAccountService
{
    /**
     * @param $providerObj
     * @param $providerName
     * @return mixed
     * создание или получение юзера
     */
    public function createOrGetUser($providerObj, $providerName)
    {
        $providerUser = $providerObj->user();
        $account = User::whereSocialProvider($providerUser, $providerName);

        if ($account) {
            return $account;
        } else {
            $user = User::createBySocialProvider($providerUser, $providerName);
            if ($user) {
                return $user;
            }
            return abort(500);
        }

    }
}