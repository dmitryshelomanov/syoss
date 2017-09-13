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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * кол-во лайков
     */
    public function likes()
    {
        return $this->hasOne('App\Models\Likes', 'photo_id', 'photo_id');
    }

    public function winners()
    {
        return $this->hasOne('App\Models\Battle', 'winner', 'winner')
                ->where('winner', 1);
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

    /**
     * @param $q
     * @return mixed
     * скоуп. Получаем инфу о фото
     */
    public function scopePhotoInfo($q)
    {
        return $q->with(['photo' => function($q) {
                    $q->with(['likes' => function($q) {
                        $q->select('id', 'photo_id', 'user_id')
                            ->where('user_id', Auth::user() ? Auth::user()->id : 0);
                    }])
                    ->with(['user' => function($q) {
                        $q->select('id', 'uid', 'provider');
                    }]);
                }]);
    }

    /**
     * @param $q
     * @return mixed
     * скоуп. Получаем опубликованные фотки
     */
    public function scopePublished($q, $current = true, $week = 0)
    {
        if ($current) {
            return $q->where([
                ['week', DateHelper::currentStep()],
                ['publish', 2]
            ]);
        }
        return $this->scopeAll($q, $week);
    }

    /**
     * @param $q
     * @return mixed
     * получить все фотки по определенно неделе
     */
    public function scopeAll($q, $week)
    {
        return $q->where([
            ['week', $week],
            ['publish', 2]
        ]);
    }

    /**
     * @param $user
     * @return bool|null
     * удалить фото из батла
     */
    public function reCompetition($user)
    {
        return $this->where([
            ['user_id', $user->id],
            ['week', DateHelper::currentstep()]
        ])->delete();
    }
}
