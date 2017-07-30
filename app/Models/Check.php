<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $table = "check";

    public function photo()
    {
        return $this->hasOne('App\Models\Photo');
    }

    public function saveCheck($photo_id, $link)
    {
        return $this->insert([
            'photo_id' => $photo_id,
            'link' => $link
        ]);
    }
}
