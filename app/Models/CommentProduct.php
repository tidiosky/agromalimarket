<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;

class CommentProduct extends Model
{
    //
    protected $fillable = ['body', 'user_id', 'post_id'];
    protected $table = 'comment_products';

    public function product()
    {
        return $this->belongsTo(Produit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
