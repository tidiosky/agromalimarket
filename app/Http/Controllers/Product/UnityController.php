<?php

namespace App\Http\Controllers\Product;

use App\Models\Unity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $unity = Unity::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $unity = Unity::where('user_id', '=', \auth()->user()->id)->latest()->paginate($perPage);
        }

        return view('product.unity.index', compact('unity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('product.unity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:unities',
        ]);
        $cat = new Unity();
        $cat->name = $request->name;

        $unity = $request->user()->unity()->save($cat);
        if ($unity){
            toastr()->success('Felecitation votre unité crée avec succès');
        }



        return redirect('admin/unity')->with('flash_message', 'Unity added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $unity = Unity::findOrFail($id);
        if (Auth::user() != $unity->user) {
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");
        }
        return view('product.unity.show', compact('unity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $unity = Unity::findOrFail($id);
        if (Auth::user() != $unity->user) {
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");
        }
        return view('product.unity.edit', compact('unity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $unity = Unity::findOrFail($id);

        $unity->name = $request->name;
        if (Auth::user() != $unity->user) {
            toastr()->warning('Vous n\'avez aucun droit de modification sur ce ficher car il ne vous appartient pas');
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");

        }
        $request->user()->unity()->save($unity);
        toastr()->success('Felecitation votre unité a été modifié avec succès');
        return redirect('admin/unity')->with('flash_message', 'Unity updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $unity = Unity::find($id);
        if (Auth::user() != $unity->user) {
            toastr()->warning('Vous n\'avez aucun droit de modification sur ce ficher car il ne vous appartient pas');
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");
        }
        Unity::destroy($id);
        toastr()->success('Felecitation votre unité a été supprimé avec succès');
        return redirect('admin/unity')->with('flash_message', 'Unity deleted!');
    }
}
