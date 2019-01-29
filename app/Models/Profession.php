<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //
     public function user()
    {
        return $this->hasMany('App\User');
    }
}
