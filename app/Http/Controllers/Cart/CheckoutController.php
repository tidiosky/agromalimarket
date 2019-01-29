<?php

namespace App\Http\Controllers\Cart;


use App\Mail\OrderPlaced;
use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\Produit;
use Cartalyst\Stripe\Exception\CardErrorException;
//use Cartalyst\Stripe\Laravel\Facades\Stripe;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use LaravelQRCode\Facades\QRCode;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Tzsk\Sms\Facade\Sms;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.product.checkout');
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

//
//        Cart::instance('default')->destroy();
//        return redirect()->route('product.index')->with('success',"Votre paiement à été effectué avec succès");


        try {
            $contents = Cart::content()->map(function ($item) {
                return $item->model->nom. '=> '.$item->qty;
            })->values()->toJson();
            Stripe::setApiKey('sk_test_KXhscv0b2Q9hG3pyrPAciSaB');
            $customer = Customer::create([
                'source' => 'tok_mastercard',
                'email' => $request->email,

            ]);
            $charge = Charge::create(array(
                "amount" =>  (Cart::total(2,'.','')*100),
                "currency" => "usd",
                "receipt_email" =>$request->email,

                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test charge",
                'customer' => $customer->id,

                'metadata' => [
                    'contents' => $contents,
                    "Téléphone" => $request->phone,
                    "address_city"=> null,
                    "Pays de transaction"=> $request->country,
                    "Nom du client"=> $request->username,
                    "adresse du client"=> $request->address,
                    "address_line2"=> null,
                    "address_state"=> null,
                    "address_zip"=> null,
                    "address_zip_check"=> null,
                    'quantity' => Cart::instance('default')->count()
                ]
            ));
            //dd($charge);
            $orders = new Order();
            $orders->address = $request->input('address');
            $orders->montant = $charge->amount/100;
            //$orders->quantity = Cart::instance('default')->count();
            $orders->phone_number = $request->input('phone_number');
            $orders->name = $request->input('name');
//            $order->last_name = $request->input('last_name');
            $orders->country = $request->input('country');
            $orders->city = $request->input('city');
            $orders->email = $request->input('email');
//            $order->username = $request->input('username');
            $orders->payment_id = $charge->id;
            if (isset(\auth()->user()->id)) {
                Auth::user()->orders()->save($orders);
            }
//
            $orders->save();
            Mail::send(new OrderShipped($orders));
           // QRCode::email(new OrderShipped($orders))->png();
//            Sms::send("Text to send.", function($sms) {
//                $sms->to(['0022374749131', '0022364103460']); # The numbers to send to.
//            });
            $this->decreaseQuantities();
            Cart::instance('default')->destroy();
            toastr()->success('Votre paiement à été effectué avec succès');
            return redirect()->route('product.index')->with('success',"Votre paiement à été effectué avec succès");
        } catch (CardErrorException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

//try{
//    $contents = Cart::content()->map(function ($item) {
//                return $item->model->nom. '=> '.$item->qty;
//            })->values()->toJson();
//    $charge = Stripe::charges()->create([
//        'amount' => floatval(Cart::total() /100),
//        'currency' => "CAD",
//        'source' => $request->StripeToken,
//        'description' => 'Order',
//        'receipt_mail' => $request->email,
//        'metadata' => [
//            'contents' => $contents,
//            'quantity' => Cart::instance('default')->count()
//        ]
//    ]);
//    dd($charge);
//    Cart::instance('default')->destroy();
//    toastr()->success('Votre paiement à été effectué avec succès');
//    return redirect()->route('shop.index')->with('success',"Votre paiement à été effectué avec succès");
//} catch (CardErrorException $exception) {
//
//}

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

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Produit::find($item->model->id);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }
}
