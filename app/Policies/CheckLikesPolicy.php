<?php

namespace App\Policies;

use App\Models\Likes;
use App\Models\Users\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckLikesPolicy
{
    use HandlesAuthorization;

    private $likes;

    public function __construct(Likes $likes)
    {
        $this->likes = $likes;
    }

    /**
     * @param User $user
     * @param $photo_id
     * @return bool
     * проверка можно ли ставить лайк
     */
    public function setLike(User $user, $photo_id)
    {
        if ($this->likes->getInfo($user->id, $photo_id) === null) {
            return true;
        }
        return false;
    }

    /**
     * @param User $user
     * @param $photo_id
     * @return bool
     * проверка можно ли снять лайк
     */
    public function unSetLike(User $user, $photo_id)
    {
        if ($this->likes->getInfo($user->id, $photo_id) !== null) {
            return true;
        }
        return false;
    }
}
