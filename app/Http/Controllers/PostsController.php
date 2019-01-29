<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('blog.socials.dashboard',['posts' => $posts]);
    }
    public function postCreatePost(Request $request)
    {
        //Validation
        $this->validate($request,[
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $datas = $request->user()->posts()->save($post);
        $message = "Il y a une erreur";
        if ($datas){
            $message = 'Post cree avec succès';
        }
        return redirect()->route('blog.post.index')->with(['message' => $message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id',$post_id)->first();

        if (Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('blog.post.index')->with(['message' => 'Message supprimer avec succès']);
    }

    public function postEditPost(Request $request)
    {

        $this->validate($request,[
            'body' => 'required|max:1000'
        ]);
        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        if (Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->update();
        return response()->json(['new_body' => $post->body],200);
    }

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post){
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id' , $post_id)->first();
        if ($like){
            $already_like = $like->like();
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}
