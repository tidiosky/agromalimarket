<?php

namespace App\Http\Controllers\Src;


use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Produit::where('quantity', '>', '0')->inRandomOrder()->take(12)->get();
        $categories = Categorie::orderBy('name','ASC')->get();
        return view('src.shop.shop',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $product = Produit::where('slug',$slug)
                            ->where('quantity', '>', '0')
                            ->firstOrFail();
        $mighAlsoLike = Produit::where('slug',"!=",$slug)
                                ->where('quantity', '>', '0')
                                ->inRandomOrder()->take(4)->get();
        return view('src.shop.show',compact('product','mighAlsoLike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
