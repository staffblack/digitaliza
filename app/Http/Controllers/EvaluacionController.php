<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
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
            $evaluacion = Evaluacion::where('id', 'LIKE', "%$keyword%")
                ->orWhere('n_preguntas', 'LIKE', "%$keyword%")
                ->orWhere('id_grupo', 'LIKE', "%$keyword%")
                ->orWhere('id_asignacion', 'LIKE', "%$keyword%")
                ->orWhere('id_docente', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $evaluacion = Evaluacion::latest()->paginate($perPage);
        }

        return view('evaluacion.index', compact('evaluacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('evaluacion.create');
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
        $numero_preguntas=$request->input('numero_preguntas');
        $id_evaluacion=$request->input('numero_preguntas');
        $id_docente=$request->input('numero_preguntas');
        Evaluacion::create($requestData);

        return redirect('http://201.183.227.29/evalua/public/detalle/create?numero_preguntas=5&id_evaluacion=3&id_docente=1')->with('flash_message', 'Evaluacion added!');
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
        $evaluacion = Evaluacion::findOrFail($id);

        return view('evaluacion.show', compact('evaluacion'));
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
        $evaluacion = Evaluacion::findOrFail($id);

        return view('evaluacion.edit', compact('evaluacion'));
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
        
        $evaluacion = Evaluacion::findOrFail($id);
        $evaluacion->update($requestData);

        return redirect('evaluacion')->with('flash_message', 'Evaluacion updated!');
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
        Evaluacion::destroy($id);

        return redirect('evaluacion')->with('flash_message', 'Evaluacion deleted!');
    }
}
