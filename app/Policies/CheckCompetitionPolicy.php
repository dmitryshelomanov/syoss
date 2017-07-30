<?php

namespace App\Policies;

use App\Models\Users\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Battle;

class CheckCompetitionPolicy
{
    use HandlesAuthorization;

    private $battle;

    public function __construct(Battle $battle)
    {
        $this->battle = $battle;
    }

    /**
     * @return bool
     * может ли принять участие юзер. Или уже принимает
     */
    public function check()
    {
        if ($this->battle->checkCompetition() === null) {
            return true;
        }
        return false;
    }
}
