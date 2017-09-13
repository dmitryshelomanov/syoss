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
            return $this->mergeAccount($account, $providerUser, $providerName);
        } else {
            $user = User::createBySocialProvider($providerUser, $providerName);
            if ($user) {
                return $user;
            }
            return abort(500);
        }

    }

    /**
     * Мерж аков при входе
     * @param $user
     * @param $providerUser
     * @param $providerName
     * @return bool
     */
    public function mergeAccount($user, $providerUser, $providerName) {
        $providerUser = [
            'email' => $providerUser->getEmail(),
            'name' => $providerUser->getName(),
            'avatar' => $providerUser->getAvatar(),
        ];
        $user = [
            'uid' => $user->uid,
            'email' => $user->email,
            'name' => $user->name,
            'avatar' => $user->avatar,
            'provider' => $user->provider
        ];
        $newUser = array_merge($user, $providerUser);
        return User::updateUser($newUser);
    }
}