<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
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
            $sucursal = Sucursal::where('id', 'LIKE', "%$keyword%")
                ->orWhere('id_empresa', 'LIKE', "%$keyword%")
                ->orWhere('nombre_sucursal', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sucursal = Sucursal::latest()->paginate($perPage);
        }

        return view('sucursal.index', compact('sucursal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sucursal.create');
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
        
        Sucursal::create($requestData);

        return redirect('sucursal')->with('flash_message', 'Sucursal added!');
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
        $sucursal = Sucursal::findOrFail($id);

        return view('sucursal.show', compact('sucursal'));
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
        $sucursal = Sucursal::findOrFail($id);

        return view('sucursal.edit', compact('sucursal'));
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
        
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->update($requestData);

        return redirect('sucursal')->with('flash_message', 'Sucursal updated!');
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
        Sucursal::destroy($id);

        return redirect('sucursal')->with('flash_message', 'Sucursal deleted!');
    }
}
