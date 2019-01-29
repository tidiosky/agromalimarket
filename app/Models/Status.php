<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = "statuses";
    protected $fillable = [
        'body',


    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeNotReply($query)
    {
        return $query->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Status::class,'parent_id');
    }

    public function likes()
    {
        return $this->morphMany(Likeable::class,'likeable');
    }
}
