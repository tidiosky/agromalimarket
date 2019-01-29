<?php

namespace App\Http\Controllers;

use App\Models\Produit;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('q');
        if (!$query){
            return redirect()->route('home');
        }
        $users = User::where(DB::raw("CONCAT(first_name , '' , last_name)"), 'LIKE' , "%{$query}%")
            ->orWhere('name', 'LIKE' , "%{$query}%")
            ->orWhere('section', 'LIKE' , "%{$query}%")
            ->orWhere('shop_name', 'LIKE' , "%{$query}%")
            ->orWhere('phone', 'LIKE' , "%{$query}%")
            ->orWhere('address', 'LIKE' , "%{$query}%")
            ->get();
        return view('pages.net.search.result')->with('users',$users);

    }

    public function searchProd(Request $request)
    {
        $query = $request->input('q');
        $products = Produit::where('nom','LIKE',"%{$query}%")
            ->orWhere('price', 'LIKE',"%{$query}%")
            ->orWhere('quantity', 'LIKE',"%{$query}%")
            ->get();
        $users = User::where(DB::raw("CONCAT(first_name , '' , last_name)"), 'LIKE' , "%{$query}%")
            ->orWhere('name', 'LIKE' , "%{$query}%")
            ->orWhere('email', 'LIKE' , "%{$query}%")
            ->orWhere('section', 'LIKE' , "%{$query}%")
            ->orWhere('shop_name', 'LIKE' , "%{$query}%")
            ->orWhere('phone', 'LIKE' , "%{$query}%")
            ->orWhere('address', 'LIKE' , "%{$query}%")
            ->get();
        return view('pages.product.search',compact('products','users'));
    }

    public function searchPro(Request $request)
    {
        if ($request->ajax()) {
            $products = DB::table('produits')->where('nom','LIKE','%' .$request->search. '%')->get();
        }
    }
    
}
