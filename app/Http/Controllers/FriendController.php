<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    //
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();
        return view('pages.net.friend.index')
            ->with('friends',$friends)
            ->with('requests',$requests);
    }

    public function getAdd($name)
    {
        $user = User::where('name',$name)->first();
        if (Auth::user()->id === $user->id){
            return redirect()->route('home');
        }
        if (!$user){
            toastr()->warning('L\'utilisateur ne peut pas etre trouvé');
            return redirect()->back()->with(['danger' => "L'utilisateur ne peut pas etre trouvé"]);
        }
        if (Auth::user()->hasFriendRequestPending($user)  ||  $user->hasFriendRequestPending(Auth::user())){
            toastr()->success('La demande d\'amis a ete  envoyé');
            return redirect()->route('profile.index',['name' => $name])->with(['success' => "La demande d'amis a ete  envoyé"]);
        }
        if (Auth::user()->isFriendsWith($user)){
            toastr()->success('Démande d\'amis déja envoyé');
            return redirect()->route('profile.index',['name' => $name])->with(['success' => "Démande d'amis déja envoyé"]);
        }
        Auth::user()->addFriend($user);
        toastr()->success('Demande envoyée');
        return redirect()->route('profile.index',['name' => $name])->with(['success' => "Demmande envoyée"]);

    }

    public function getAccept($name)
    {
        $user = User::where('name',$name)->first();
        if (!$user){
            toastr()->warning('L\'utilisateur ne peut pas etre trouvé');
            return redirect()->route('home')->with(['message' => "L'utilisateur ne peut pas etre trouvé"]);
        }
        if (!Auth::user()->hasFriendRequestReceived($user)) {
            return redirect()->route('home');
        }
        Auth::user()->acceptFriendRequest($user);
        toastr()->success('Demmande acceptée');
        return redirect()->route('profile.index',['name' => $name])->with(['message' => "Demmande acceptée"]);
    }

    public function postDelete($name)
    {
        $user = User::where('name', $name)->first();
        if (!Auth::user()->isFriendsWith($user)){
            return redirect()->back();
        }
        \auth()->user()->deleteFriend($user);
        toastr()->success('Amis rétiré avec succès');
        return redirect()->back()->with('info',"Amis rétiré avec succès");
    }
}
