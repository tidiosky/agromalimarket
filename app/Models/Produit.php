<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{


    //
    protected $fillable = ['nom','filename','price','quantity','about','categorie_id','unity_id', 'view_count'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function unity()
    {
        return $this->belongsTo(Unity::class);
    }
    public function comments()
    {
        return $this->hasMany(CommentProduct::class);
    }
//    public function comments()
//    {
//        return $this->morphMany(Comment::class,'commentable');
//    }

    public function favorite_to_users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
