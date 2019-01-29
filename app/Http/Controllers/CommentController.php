<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        $this->validate($request,[
            'status' => "required|max:1000"
        ]);
        Auth::user()->comment()->create([
            'body' => $request->input('status')
        ]);
        toastr()->success('Status crée avec succès');
        return redirect()->route('home')->with(['message' => "Post crée avec succès"]);
    }
    //oumdiak88@gmail.com
    public function postReply(Request $request, $statusId)
    {
        $this->validate($request,[
            "reply-{$statusId}" => 'required|max:1000'
        ],[
            'required' => "La reponse est necessaire"
        ]);
        $status = Comment::NotReply()->find($statusId);
        if (!$status) {
            toastr()->warning('Le status n\'existe pas');
            return redirect()->route('home')->with(['info' => "Le status n'existe pas"]);
        }
//        if (!Auth::user()->isFriendsWith($status->user) and Auth::user()->id !== $status->user->id) {
//            return redirect()->route('home')->with(['info' => "Impossible de trouver l'utilisateur"]);
//        }
        $reply = Comment::create([
            'body' => $request->input("reply-{$statusId}"),

        ])->user()->associate(auth()->user()->id);


//
        $status->replies()->save($reply);
        toastr()->success('Reponse effectué avec succès');
        return redirect()->back()->with('success', "Reponse effectué avec succès");
    }

    public function getLike($statusId)
    {
        $status = Comment::find($statusId);

        if (!$status) {
            toastr()->warning('Le status n\'existe pas');
            return redirect()->route('home')->with(['info' => "Le status n'existe pas"]);
        }
//        if (!Auth::user()->isFriendsWith($status->user)) {
//            return redirect()->route('home')->with(['info' => "Impossible de trouver l'utilisateur"]);
//        }
        if (\auth()->user()->hasLikedStatus($status)) {
            return redirect()->back();
        }
        $like = $status->likes()->create([]);
        \auth()->user()->likes()->save($like);

        return redirect()->back();
    }
    public function addProductComment(Request $request, Produit $product)
    {
       if ($request->ajax()) {
           $this->validate($request,[
               'body' => 'required'
           ]);
           $comments = new Comment();
           $comments->body = $request->body;
           $comments->user_id = auth()->user()->id;
           $comments->commentable_id = $product->id;
//        dd($request->$articleVideo);
           return $product->comments()->save($comments);
////        dd($data);
//           toastr()->success('Commentaire posté avec succès');
//           return back()->with('success',"Commentaire posté avec succès");
       }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param Request $request
     * @param Produit $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Produit $product)
    {
        //
        if ($request->ajax()) {
            return view('pages.product.show_comment', compact('product'));
        }
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
