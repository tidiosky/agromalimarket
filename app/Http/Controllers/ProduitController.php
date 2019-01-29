<?php

namespace App\Http\Controllers;



use App\Models\Cart;
use App\Models\Categorie;
use App\Models\Location;
use App\Models\Order;
use App\Models\Produit;
use App\Models\Unity;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends Controller
{
    public function getLocate()
    {
        $districts = Location::pluck('district','district');
        return view('pages.product.geolocation',compact('districts'));
    }
    public function index(Request $request, Produit $produit)
    {
        if (request()->categorie_id) {
            $products = Produit::with('categorie_id')->whereHas('categorie_id', function ($query) {
                $query->where('name', request()->categorie_id);
            });
            $categories = Categorie::orderBy('name','ASC')->get();
        } else {
            $pubs = Produit::all();
            $products = Produit::where('quantity', '>', '0')->inRandomOrder()->paginate(6);
            $categories = Categorie::orderBy('name','ASC')->get();
            $unities = Unity::orderBy('name', 'ASC')->get();
            VisitLog::save();

//            if (!Session::has($prodKey)) {
//                $product->increment('view_count');
//                Session::put($prodKey,1);
//            }
//            $prodKey = \request()->id;
//            if (!Session::has($prodKey)) {
//                $visite = Visite::create($request->all());
//                $visite->increment('visite_id');
//                Session::put($prodKey, 1);
//            }
//            dd($prodKey);
        }




        return view('pages.product.index',compact('products','categories','pubs','unities','produit'));


    }

    public function indexCategories($cat)
    {
        $products = Produit::where('categorie_id',$cat)
                   ->where('quantity', '>', '0')
                   ->inRandomOrder()->paginate(6);
        $categories = Categorie::orderBy('name','ASC')->get();
        $unities = Unity::orderBy('name', 'ASC')->get();
        VisitLog::save();
        return view('pages.product.index',compact('products','categories','unities'));
    }
    public function indexUnities($cat)
    {
        $products = Produit::where('unity_id',$cat)
            ->where('quantity', '>', '0')
            ->inRandomOrder()->paginate(6);
        $unities = Unity::orderBy('name', 'ASC')->get();
        $categories = Categorie::orderBy('name','ASC')->get();
        VisitLog::save();
        return view('pages.product.index',compact('products','unities','categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @Route("/crud/article",name="article_crud")
     */

    public function getUpload()
    {
        $unities = Unity::orderBy('name','ASC')->get();
        $categories = Categorie::orderBy('name','ASC')->get();
        return view('pages.product.new',compact('unities','categories'));
    }

    public function show($slug)
    {
        $product = Produit::where('slug',$slug)->firstOrFail();
        $prodKey =   $product->id;
        $productQuantity = $product->quantity;
        $quantity = $product->quantity;
        if (!Session::has($prodKey)) {
            $product->increment('view_count');
            Session::put($prodKey,1);
        }
        $stockLevel = getStockLevel($quantity);
        VisitLog::save();
        $mighAlsoLike = Produit::where('slug',"!=",$slug)->inRandomOrder()->take(8)->get();
        $mostExpensiveProduct = Produit::where('price', '>=', '799')->Where('quantity', '>', '0')->inRandomOrder()->take(4)->get();
        return view('pages.product.show',compact('product','mighAlsoLike','stockLevel','productQuantity','mostExpensiveProduct'));
    }
    public function show_modal($slug)
    {
        $products = Produit::all();

        $mighAlsoLike = Produit::where('slug',"!=",$slug)
                         ->where('quantity', '>', '0')
                         ->inRandomOrder()->take(8)->get();
        return view('pages.product_modal',compact('products','mighAlsoLike'));
    }

    public function likeProduct(Request $request)
    {
        $product_id = $request['product_id'];
        $is_like = $request['isLike'] == 'true';
        $update = false;
        $product = Produit::find($product_id);
        if (!$product) {
            return null;
        }
        $user = Auth::user();
    }


    public function getAddToCart(Request $request,$id)
    {
        $product = Produit::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart', $cart);
       // dd($request->session()->get('cart'));
        return redirect()->back()->with(['message' => 'Produit ajouté au panier avec success']);
    }

    public function postAdd($id)
    {
        $product = Produit::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart',$cart);
        if (count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart',$cart);
        }
        return redirect()->back();
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart',$cart);
        }

        return redirect()->back();
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('pages.product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $mighAlsoLike = Produit::inRandomOrder()->take(4)->get();
        $cart = new Cart($oldCart);
        return view('pages.product.shoppingCart',['products' => $cart->items,'totalPrice' => $cart->totalPrice,'mighAlsoLike' => $mighAlsoLike]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('pages.product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('pages.product.checkout',['total' => $total,'products' => $cart->items]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('article.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $order = new Order();
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_DU1eUrQkqWw50OwmrASWpOia');
        // Create a Customer:
        $customer = Customer::create([
            'source' => 'tok_mastercard',
            'email' => $order->email
        ]);
        try{
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "receipt_email" =>$customer->email,
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test charge",
                'customer' => $customer->id,
            ));

            $order->cart = serialize($cart);
            $order->address1 = $request->input('address1');
//            $order->address2 = $request->input('address2');
//            $order->email = $request->input('email');
            $order->phone_number = $request->input('phone_number');
//            $order->name = $request->input('name');
//            $order->last_name = $request->input('last_name');
            $order->country = $request->input('country');
            $order->city = $request->input('city');
//            $order->username = $request->input('username');
            $order->payment_id = $charge->id;
            Auth::user()->orders()->save($order);
        }catch (\Exception $exception){
            return redirect()->route('article.checkout')->with('error', $exception->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('article.recu')->with(['message' => "Paiement a été effectué avec succès"]);
    }
    public function getRecu(User $user)
    {
       // $orders = Auth::user()->orders;
       # $user = \auth()->user()->id;
       if ($user) {
           $orders = Order::find($user);
       }
        return view('pages.product.recu',['orders' => $orders]);
    }
    public function searchProduits(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        $products = User::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();
        return $products;
    }

    public function searchCity(Request $request)
    {
        $distval = $request->distval;
        $matchedCities = Location::where('district',$distval)->pluck('city','city');
        return view('ajaxresult',compact('matchedCities'));
    }
}
