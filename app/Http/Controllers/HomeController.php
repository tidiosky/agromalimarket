<?php

namespace App\Http\Controllers;


use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::notReply()->where(function ($query) {
            return $query->where('user_id', Auth::user()->id)
                ->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('home')->with('statuses',$statuses);
    }
}
