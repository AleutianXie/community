<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    public function photos()
    {
        return $this->hasMany('App\Photo', 'aid');
    }

    public function designPhotos()
    {
        return $this->hasMany('App\Photo', 'aid')->where(['type' => '设计']);
    }

    public function completePhotos()
    {
        return $this->hasMany('App\Photo', 'aid')->where(['type' => '竣工']);
    }
    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'pid');
    }
}
