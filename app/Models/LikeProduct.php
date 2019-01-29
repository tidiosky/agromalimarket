<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LikeProduct extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Produit::class);
    }
}
