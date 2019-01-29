<?php

namespace App\Http\Controllers\Chat;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yoeunes\Toastr\Facades\Toastr;


class SubscriberController extends Controller
{
    //
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers'
        ]);
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        Toastr::success("Votre inscription à la new letter à bien été effectué avec succès");
        return redirect()->back();
    }
}
