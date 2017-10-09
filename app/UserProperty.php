<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Property;

class UserProperty extends Model
{
    //
    public function property() {
        return $this->hasOne('App\Property', 'id', 'pid');
    }
}
