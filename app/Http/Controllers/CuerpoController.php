<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cuerpo;
use Illuminate\Http\Request;

class CuerpoController extends Controller
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
            $cuerpo = Cuerpo::where('id', 'LIKE', "%$keyword%")
                ->orWhere('cuerpo', 'LIKE', "%$keyword%")
                ->orWhere('observacion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cuerpo = Cuerpo::latest()->paginate($perPage);
        }

        return view('cuerpo.index', compact('cuerpo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cuerpo.create');
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
        
        Cuerpo::create($requestData);

        return redirect('cuerpo')->with('flash_message', 'Cuerpo added!');
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
        $cuerpo = Cuerpo::findOrFail($id);

        return view('cuerpo.show', compact('cuerpo'));
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
        $cuerpo = Cuerpo::findOrFail($id);

        return view('cuerpo.edit', compact('cuerpo'));
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
        
        $cuerpo = Cuerpo::findOrFail($id);
        $cuerpo->update($requestData);

        return redirect('cuerpo')->with('flash_message', 'Cuerpo updated!');
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
        Cuerpo::destroy($id);

        return redirect('cuerpo')->with('flash_message', 'Cuerpo deleted!');
    }
}
