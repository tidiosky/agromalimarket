<?php

namespace App\Http\Controllers\Product;

use App\Models\Categorie;
use App\Models\ProductName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
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
            $category = Categorie::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = Categorie::where('user_id', '=', \auth()->user()->id)->latest()->paginate($perPage);
          //  $category = Categorie::latest()->paginate($perPage);
        }

        return view('product.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('product.category.create');
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
        if ($request->ajax()) {
            $this->validate($request,[
                'name' => 'required|unique:categories',
            ]);

            $cat = new Categorie();
            $cat->name = $request->name;
            session()->put('warning','This is for warning.');
            return $request->user()->category()->save($cat);

//            toastr()->warning('Catégorie crée avec succès');
//
        }

        //return redirect('admin/category')->with('flash_message', 'Category added!');
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
        $category = Categorie::findOrFail($id);

        return view('product.category.show', compact('category'));
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
        $category = Categorie::findOrFail($id);
        if (Auth::user() != $category->user) {
            toastr()->warning('Vous n\'avez aucun droit de modification sur ce ficher car il ne vous appartient pas');
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");
        }
        return view('product.category.edit', compact('category'));
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



        $category = Categorie::findOrFail($id);
        $category->name = $request->name;
        if (Auth::user() != $category->user) {
            toastr()->warning('Vous n\'avez aucun droit de modification sur ce ficher car il ne vous appartient pas');
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");
        }
        $request->user()->category()->save($category);
        toastr()->success('Félicitaion catégorie à été mis a jour avec succès');
        return redirect('admin/category')->with('flash_message', 'Category updated!');
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
        $category = Categorie::find($id);
        if (Auth::user() != $category->user) {
            toastr()->warning('Vous n\'avez aucun droit de modification sur ce ficher car il ne vous appartient pas');
            return redirect()->back()->with('danger',"Vous n'avez aucun droit de modification sur ce ficher car il ne vous appartient pas");
        }
        Categorie::destroy($id);
        toastr()->success('Félicitation catégorie supprimée avec succès');
        return redirect('admin/category')->with('flash_message',"Categorie supprimer avec succès");
    }

    public function getShow(Request $request)
    {
        if ($request->ajax()) {
            return response(ProductName::where('categorie_id', $request->categorie_id)->get());
        }
    }
}
