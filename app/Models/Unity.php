<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    //
    public function products()
    {
        return $this->hasMany(Produit::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
