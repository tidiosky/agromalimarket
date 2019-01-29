<?php

namespace App\Http\Controllers;

use App\Models\CommentProduct;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommentPController extends Controller
{
    public function index(Produit $post)
    {
        return response()->json($post->comments()->with('user')->latest()->get());
    }

    public function store(Request $request, Produit $post)
    {
        $comment = $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        $comment = CommentProduct::where('id', $comment->id)->with('user')->first();
       // broadcast(new NewComment($comment))->toOthers();
        return $comment->toJson();
    }
}
