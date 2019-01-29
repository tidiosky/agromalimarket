<?php

namespace App\Http\Controllers\Cart;

use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mighAlsoLike = Produit::where('quantity', '>', '0')->inRandomOrder()->take(8)->get();
        return view('pages.product.cart',compact('mighAlsoLike'));
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

        Cart::add($request->id, $request->nom,1, $request->price)
            ->associate(Produit::class)
        ;
        toastr()->success('Produit ajouté au panier avec succès');

        return redirect()->back()->with('info',"Produit ajouté au panier avec succès");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $validator = Validator::make($request->all(),[
            'quantity' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            toastr()->warning('La quantité doit etre comprise entre 1 et 10');
            session()->flash('danger',collect('La quantité doit etre comprise entre 1 et 10'));
            return response()->json(['danger', false],400);
        }
        if ($request->quantity > $request->productQuantity) {
            toastr()->warning("Vous n'avez pas cette quantité dans votre stock");
            session()->flash('danger',collect('Vous n\'avez pas cette quantité dans votre stock'));
            return response()->json(['danger', false],400);
        }
        Cart::update($id, $request->quantity);
        toastr()->success('Quantité modifiée avec succès');
        session()->flash('success',"Quantité modifiée avec succès");
        return response()->json(['success', true]);

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
        Cart::remove($id);
        return redirect()->back()->with('success', "Commande annulée avec succès");
    }
}
