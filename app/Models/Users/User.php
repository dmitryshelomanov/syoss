<?php

namespace App\Models\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'email', 'provider', 'avatar', 'name'
    ];

    /**
     * @param $providerUser
     * @param $providerName
     * @return $this|\Illuminate\Database\Eloquent\Model
     * создание юзера в бд
     */
    public static function createBySocialProvider($providerUser, $providerName)
    {
        return self::create([
            'uid' => $providerUser->getId(),
            'email' => $providerUser->getEmail(),
            'name' => $providerUser->getName(),
            'avatar' => $providerUser->getAvatar(),
            'provider' => $providerName
        ]);
    }

    /**
     * @param $providerUser
     * @param $providerName
     * @return mixed
     * получение инфы. есть ли юзер в бд
     */
    public static function whereSocialProvider($providerUser, $providerName)
    {
        return self::where([
            ['uid' , $providerUser->getId()],
            ['email', $providerUser->getEmail()],
            ['provider', $providerName]
        ])->first();
    }
}
