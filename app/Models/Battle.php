<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateHelper;
use Auth;

class Battle extends Model
{
    protected $table = "battle";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * получить инфу о фотке учавствующей в соревнованиях
     */
    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    /**
     * @return mixed
     * проверка учавствует ли юзер уже или нет
     */
    public function checkCompetition()
    {
        return $this->where([
            ['user_id', Auth::user()->id],
            ['week', DateHelper::currentStep()]
        ])->first();
    }

    /**
     * @param $photo_id
     * @return bool
     * сохранение информации о том что юзер принимает участие
     */
    public function addToBattle($photo_id)
    {
        return $this->insert([
            'user_id' => Auth::user()->id,
            'photo_id' => $photo_id,
            'week' => DateHelper::currentStep()
        ]);
    }
}
