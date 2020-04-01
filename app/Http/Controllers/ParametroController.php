<?php

namespace App\Http\Controllers;

use App\Parametro;
use Illuminate\Http\Request;
#use Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreMateriasRequest;
use Spatie\Permission\Contracts\Role;

class ParametroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametros =Parametro::all();//
		return view('parametro.index', compact('parametros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function show(Parametro $parametro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $parametro = Parametro::findOrFail($id);

        return view('parametro.edit', compact('parametro'));
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $parametro = Parametro::findOrFail($id);
        $parametro->update($request->all());

        return redirect()->route('admin.parametro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametro $parametro)
    {
        //
    }
}
