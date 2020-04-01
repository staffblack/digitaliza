<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subdepartamento;
use Illuminate\Http\Request;

class SubdepartamentoController extends Controller
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
            $subdepartamento = Subdepartamento::where('id', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $subdepartamento = Subdepartamento::latest()->paginate($perPage);
        }

        return view('subdepartamento.index', compact('subdepartamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('subdepartamento.create');
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
        
        Subdepartamento::create($requestData);

        return redirect('subdepartamento')->with('flash_message', 'Subdepartamento added!');
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
        $subdepartamento = Subdepartamento::findOrFail($id);

        return view('subdepartamento.show', compact('subdepartamento'));
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
        $subdepartamento = Subdepartamento::findOrFail($id);

        return view('subdepartamento.edit', compact('subdepartamento'));
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
        
        $subdepartamento = Subdepartamento::findOrFail($id);
        $subdepartamento->update($requestData);

        return redirect('subdepartamento')->with('flash_message', 'Subdepartamento updated!');
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
        Subdepartamento::destroy($id);

        return redirect('subdepartamento')->with('flash_message', 'Subdepartamento deleted!');
    }
}
