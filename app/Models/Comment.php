<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'body', 'commentable_id'];
    protected $table = 'comments';
    protected $primaryKey = 'id';
    public function commentable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeNotReply($query)
    {
        return $query->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }
    public function likes()
    {
        return $this->morphMany(Likeable::class,'likeable');
    }
}
