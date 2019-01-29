<?php

namespace App\Http\Controllers;


use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatusController extends Controller
{
    //
    public function postStatus(Request $request)
    {
        $this->validate($request,[
           'status' => "required|max:1000"
        ]);
        Auth::user()->statuses()->create([
            'body' => $request->input('status')
        ]);
        return redirect()->route('home')->with(['success' => "Post crée avec succès"]);
    }

    /**
     * @param Request $request
     * @param $statusId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postReply(Request $request, $statusId)
    {
        $this->validate($request,[
            "reply-{$statusId}" => 'required|max:1000'
        ],[
            'required' => "La reponse est necessaire"
        ]);
        $status = Status::NotReply()->find($statusId);
        if (!$status) {
            toastr()->warning('Le status n\'existe pas');
            return redirect()->back()->with(['danger' => "Le status n'existe pas"]);
        }
        if (!Auth::user()->isFriendsWith($status->user) and Auth::user()->id !== $status->user->id) {
            toastr()->warning('Impossible de trouver l\'utilisateur vous devez lui envoyé une demande d\'amitié');
            return redirect()->back()->with(['danger' => "Impossible de trouver l'utilisateur vous devez lui envoyé une demande d'amitié"]);
        }
        $reply = Status::create([
           'body' => $request->input("reply-{$statusId}"),

        ])->user()->associate(auth()->user()->id);


//
        $status->replies()->save($reply);
        toastr()->success('Reponse effectué avec succès');
        return redirect()->back()->with('success', "Reponse effectué avec succès");
    }

    public function getLike($statusId)
    {
        $status = Status::find($statusId);

        if (!$status) {
            toastr()->warning('Le status n\'existe pas');
            return redirect()->route('home')->with(['danger' => "Le status n'existe pas"]);
        }
        if (!Auth::user()->isFriendsWith($status->user)) {
            toastr()->warning('Impossible de trouver l\'utilisateur');
            return redirect()->route('home')->with(['danger' => "Impossible de trouver l'utilisateur"]);
        }
        if (\auth()->user()->hasLikedStatus($status)) {
            return redirect()->back();
        }
        $like = $status->likes()->create([]);
        \auth()->user()->likes()->save($like);

        return redirect()->back();
    }
}
