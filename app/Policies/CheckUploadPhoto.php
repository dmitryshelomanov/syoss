<?php

namespace App\Policies;

use App\Models\Users\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Photo;

class CheckUploadPhoto
{
    use HandlesAuthorization;

    private $photo;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    /**
     * @param User $user
     * @return bool
     * проверка загрузил ли юзер 4-ре фотки в бд
     */
    public function check(User $user)
    {
        if ($this->photo->checkUpload($user->id) < 4) {
            return true;
        }
        return false;
    }
}
