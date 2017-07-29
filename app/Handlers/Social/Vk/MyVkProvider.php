<?php

namespace App\Handlers\Social\Vk;

use SocialiteProviders\VKontakte\Provider;
use SocialiteProviders\Manager\OAuth2\User;

class MyVkProvider extends Provider
{
    protected $fields = ['uid', 'first_name', 'last_name', 'screen_name', 'photo_200'];
    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id' => array_get($user, 'uid'), 'nickname' => array_get($user, 'screen_name'),
            'name' => trim(array_get($user, 'first_name').' '.array_get($user, 'last_name')),
            'email' => array_get($user, 'email'), 'avatar' => array_get($user, 'photo_200'),
        ]);
    }
}