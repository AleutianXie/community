<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //

  public function archives()
  {
    return $this->hasMany('App\Archive', 'pid');
  }
}
