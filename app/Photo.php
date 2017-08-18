<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function getpathAttribute($value)
    {
        return '/aetherupload/display/' . $value;
    }
}
