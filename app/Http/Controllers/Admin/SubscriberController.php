<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yoeunes\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{
    //
    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('admin.admin.subscriber',compact('subscribers'));
    }

    public function destroy($subscriber)
    {
         Subscriber::findOrFail($subscriber)->delete();
         Toastr::success("Abonnement supprimé avec succès");
         return redirect()->back();

    }
}
