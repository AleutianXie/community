<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    public function photos()
    {
        return $this->hasMany('App\Photo', 'aid');
    }
}
