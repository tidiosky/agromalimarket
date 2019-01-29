<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    //
    public function store($product)
    {
        $user = auth()->user();
        $isFavorite = $user->favorite_products()->where('produit_id', $product)->count();
        if ($isFavorite == 0) {
            $user->favorite_products()->attach($product);
            toastr('Produit ajouté aux favoris avec succès','success');
            return redirect()->back();
        } else {
            $user->favorite_products()->detach($product);
            toastr('Produit enlévé aux favoris avec succès','success');
            return redirect()->back();
        }
    }
}
