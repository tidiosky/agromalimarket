<?php

namespace App\Http\Controllers\Product;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Unity;
use App\Notifications\NewProduct;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $products = Produit::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->orWhere('filename', 'LIKE', "%$keyword%")
                ->orWhere('unity_id', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            //$products = Produit::latest()->paginate($perPage);
            $products = Produit::where('user_id', '=', \auth()->user()->id)->latest()->paginate($perPage);
        }

        return view('product.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Categorie::orderBy('name','ASC')->get();
        $unities = Unity::orderBy('name','ASC')->get();
        return view('product.products.create', compact('categories','unities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nom' => 'required',
            'filename' => 'required|image|mimes:jpg,jpeg,png,bmp,gif',
            'about' => 'required',
            'categorie_id' => 'required',
            'price' => 'required',
            'unity_id' => 'required',
            'quantity' => 'required',
            'slug'  => 'require'
        ]);
        $product = new Produit();
        $product->nom = $request['nom'];
        $product->slug = str_slug($request['nom']);
        $product->unity_id = $request['unity_id'];
        $product->categorie_id = $request['categorie_id'];
        $product->about = $request['about'];
       // $product->filename = $request['filename'];
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        if ($request->has('filename')){
            $filename = $request->file('filename');
            $img_text = $filename->getClientOriginalExtension();
            $new_img_name = rand(123456,999999) . '.' .$img_text;
            $destination_path = public_path('products');
            $filename->move($destination_path,$new_img_name);
            $product->filename = $new_img_name;

        }
        $request->user()->product()->save($product);
        $users = User::where('id', '1')->get();
        Notification::send($users, new NewProduct($product));
        toastr()->success('Felecitation votre produit a été crée avec succès');
        return redirect('admin/product')->with('flash_message', 'Product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Produit::findOrFail($id);

        return view('product.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Produit::findOrFail($id);
        if (Auth::user() != $product->user) {
            toastr()->warning('Vous n\'avez aucun droit de modification sur ce ficher car il ne vous appartient pas');
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");
        }
        $categories = Categorie::orderBy('name','ASC')->get();
        $unities = Unity::orderBy('name','ASC')->get();
        return view('product.products.edit', compact('categories','unities','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'nom' => 'required',
            'filename' => 'image|mimes:jpg,jpeg,png,bmp,gif',
            'about' => 'required',
            'categorie_id' => 'required',
            'price' => 'required',
            'unity_id' => 'required',
            'quantity' => 'required',
            'slug'  => 'require'
        ]);
        $product = Produit::find($id);
        $product->nom = $request['nom'];
        $product->slug = str_slug($request['nom']);
        $product->unity_id = $request['unity_id'];
        $product->categorie_id = $request['categorie_id'];
        $product->about = $request['about'];
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        if ($request->has('filename')){
            $filename = $request->file('filename');
            $img_text = $filename->getClientOriginalExtension();
            $new_img_name = rand(123456,999999) . '.' .$img_text;
            $destination_path = public_path('products');

            unlink($destination_path.'/'.$product->filename);
            $filename->move($destination_path,$new_img_name);
            $product->filename = $new_img_name;

        }
        if (Auth::user() != $product->user) {
            toastr()->warning('Vous n\'avez aucun droit de modification sur ce ficher car il ne vous appartient pas');
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");
        }
        $request->user()->product()->save($product);
        toastr()->success('Félécitation produit modifié avec succès');
        return redirect('admin/product')->with('flash_message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        $product = Produit::find($id);
        if (Auth::user() != $product->user) {
            toastr()->warning('Vous n\'avez aucun droit de modification sur ce ficher car il ne vous appartient pas');
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");
        }
        Produit::destroy($id);
        toastr()->success('Félicitation votre produit  à été supprimé avec succès');
        return redirect('admin/product')->with('flash_message', 'Product deleted!');
    }
}
