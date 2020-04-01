<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Asignacion;
use Illuminate\Http\Request;

class AsignacionController extends Controller
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
            $asignacion = Asignacion::where('id', 'LIKE', "%$keyword%")
                ->orWhere('titulo', 'LIKE', "%$keyword%")
                ->orWhere('id_grupo', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('archivo', 'LIKE', "%$keyword%")
                ->orWhere('id_docente', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $asignacion = Asignacion::latest()->paginate($perPage);
        }

        return view('asignacion.index', compact('asignacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('asignacion.create');
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
     
       if ($request->hasFile('archivo')) {
        $file = $request->file('archivo');
        
        /*
        $formato=$file->getMimeType();
        
        if($formato!='application/xxxx') { return back()->withErrors('Formato: '.$formato.' no aceptado'); }
        */        
        $name=time().$file->getClientOriginalName();
        
        $requestData['formato']=$name;
        //$requestData['documento']=$request->file('documento')->store('uploads','public');
        $file->move(public_path().'/storage/uploads/',$name);
        $requestData['archivo']='uploads/'.$name;
        
      
                

        
                
    }
/*
        $file = $request->file('archivo');
       
        if ($request->hasFile('archivo')) {
        
        $requestData['archivo']=$file->openFile()->fread($file->getSize());
        }
*/

        Asignacion::create($requestData);

        return redirect('asignacion')->with('flash_message', 'Asignacion added!');
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
        $asignacion = Asignacion::findOrFail($id);

        return view('asignacion.show', compact('asignacion'));
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
        $asignacion = Asignacion::findOrFail($id);

        return view('asignacion.edit', compact('asignacion'));
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
                if ($request->hasFile('archivo')) {
            $requestData['archivo'] = $request->file('archivo')
                ->store('uploads', 'public');
        }

        $asignacion = Asignacion::findOrFail($id);
        $asignacion->update($requestData);

        return redirect('asignacion')->with('flash_message', 'Asignacion updated!');
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
        Asignacion::destroy($id);

        return redirect('asignacion')->with('flash_message', 'Asignacion deleted!');
    }
}
