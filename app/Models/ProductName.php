<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductName extends Model
{
    //
    protected $fillable = ['categorie_id', 'product_name', 'description'];
    public $timestamps = false;
    protected $table = 'product_names';
    protected $primaryKey = 'id';
}
