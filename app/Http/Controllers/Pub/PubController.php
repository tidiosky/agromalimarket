<?php

namespace App\Http\Controllers\Pub;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Pub;
use Illuminate\Http\Request;

class PubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pub = Pub::where('name', 'LIKE', "%$keyword%")
                ->orWhere('filename', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pub = Pub::latest()->paginate($perPage);
        }

        return view('pub.pub.index', compact('pub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pub.pub.create');
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
        
        $requestData = $request->all();
                if ($request->hasFile('filename')) {
            $requestData['filename'] = $request->file('filename')
                ->store('uploads', 'public');
        }

        Pub::create($requestData);

        return redirect('pub/pub')->with('flash_message', 'Pub added!');
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
        $pub = Pub::findOrFail($id);

        return view('pub.pub.show', compact('pub'));
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
        $pub = Pub::findOrFail($id);

        return view('pub.pub.edit', compact('pub'));
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
        
        $requestData = $request->all();
                if ($request->hasFile('filename')) {
            $requestData['filename'] = $request->file('filename')
                ->store('uploads', 'public');
        }

        $pub = Pub::findOrFail($id);
        $pub->update($requestData);

        return redirect('pub/pub')->with('flash_message', 'Pub updated!');
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
        Pub::destroy($id);

        return redirect('pub/pub')->with('flash_message', 'Pub deleted!');
    }
}
