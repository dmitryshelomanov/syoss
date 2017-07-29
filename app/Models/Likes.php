<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = "likes";

    /**
     * @param $user_id
     * @param $photo_id
     * @return mixed
     * Получить инфу о лайках
     */
    public function getInfo($user_id, $photo_id)
    {
        return $this->where([
            ['user_id', $user_id],
            ['photo_id', $photo_id]
        ])->first();
    }

    /**
     * @param $user_id
     * @param $photo_id
     * @return bool|null
     * удалить лайк
     */
    public function unSetLike($user_id, $photo_id)
    {
        return $this->where([
            ['user_id', $user_id],
            ['photo_id', $photo_id]
        ])->delete();
    }

    /**
     * @param $user_id
     * @param $photo_id
     * @return bool
     * поставить лайк
     */
    public function setLike($user_id, $photo_id)
    {
        return $this->insert([
            'user_id' => $user_id,
            'photo_id' => $photo_id
        ]);
    }
}
