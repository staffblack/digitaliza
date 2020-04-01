<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Detalle;
use Illuminate\Http\Request;

class DetalleController extends Controller
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
            $detalle = Detalle::where('id', 'LIKE', "%$keyword%")
                ->orWhere('n_pregunta', 'LIKE', "%$keyword%")
                ->orWhere('pregunta', 'LIKE', "%$keyword%")
                ->orWhere('id_evaluacion', 'LIKE', "%$keyword%")
                ->orWhere('id_docente', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $detalle = Detalle::latest()->paginate($perPage);
        }

        return view('detalle.index', compact('detalle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('detalle.create');
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
        
        Detalle::create($requestData);

        return redirect('detalle')->with('flash_message', 'Detalle added!');
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
        $detalle = Detalle::findOrFail($id);

        return view('detalle.show', compact('detalle'));
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
        $detalle = Detalle::findOrFail($id);

        return view('detalle.edit', compact('detalle'));
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
        
        $detalle = Detalle::findOrFail($id);
        $detalle->update($requestData);

        return redirect('detalle')->with('flash_message', 'Detalle updated!');
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
        Detalle::destroy($id);

        return redirect('detalle')->with('flash_message', 'Detalle deleted!');
    }
}
