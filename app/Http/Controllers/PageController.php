<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produit;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //
    public function index()
    {
        return view('pages.social.post');
    }

    public function getContact($email)
    {

        return view('pages.contact.create',compact('email'));
    }
    /**
     * @param ContactRequest $request
     * @return string
     */
    public function store(ContactRequest $request)
    {
        $mailable = new ContactMessageCreated($request->name,$request->email,$request->message);
        Mail::to('admin@admin.ml')->send($mailable);
        return redirect()->route('homepage');
    }

    public function getShop()
    {
        $userShop = User::inRandomOrder()->take(24)->get();
        return view('src.shop.shop',compact('userShop'));
    }
    public function showShop($slug,User $user)
    {
        $shop = User::where('section',$slug)->firstOrFail();
        $products = Produit::where('user_id', '=', $user->id)
                    ->where('quantity', '>', '0')
                    ->inRandomOrder()->take(12)->get();
        $shopCatLike = User::where('section', '!=', $slug)->inRandomOrder()->take(8)->get();
        $friends = $shop->friends();
        return view('src.shop.show',compact('shop','products','shopCatLike','friends'));
    }
}
