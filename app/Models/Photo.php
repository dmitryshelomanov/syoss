<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateHelper;

class Photo extends Model
{
    protected $table = "photo";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * связь лайк с фоткой
     */
    public function likes()
    {
        return $this->hasOne('App\Models\Likes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * количество лайков
     */
    public function likeCount()
    {
        return $this->hasMany('App\Models\Likes');
    }

    /**
     * @param $value
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * получить последние фото
     */
    public function getLastPhoto($value)
    {
        return $this->orderBy('created_at')
            ->limit($value)
            ->get();
    }

    /**
     * @param $photo
     * @return bool
     * загрузка инфы о фотке
     */
    public function savePhoto($photo)
    {
        return $this->insert([
            'link' => $photo['link'],
            'user_id' => $photo['user_id'],
            'week' => $photo['week']
        ]);
    }

    /**
     * @param $user_id
     * @return int
     * получение кол-ва загруженных фоток за шаг
     */
    public function checkUpload($user_id)
    {
        return $this->where([
            ['user_id', $user_id],
            ['week', DateHelper::currentStep()]
        ])->count();
    }

    public function battle()
    {
        return $this->hasOne('App\Models\Battle');
    }

    public function check()
    {
        return $this->hasOne('App\Models\Check');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Users\User');
    }
}
