<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    protected $table = 'categories';
    public $timestamps = true;
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
