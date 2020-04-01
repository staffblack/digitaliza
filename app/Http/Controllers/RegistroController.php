<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;



use Illuminate\Support\Facades\Hash;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param  \App\Http\Requests\StoreUsersRequest  $request
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $registro = Registro::where('id', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('perfil', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $registro = Registro::latest()->paginate($perPage);
        }

        return view('registro.index', compact('registro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('registro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    

    public function store(StoreUsersRequest $request)
    {
        $datosRegistro=request()->except('_token');//excluye el token de request
        $datosRegistro['password']= Hash::make($request->input('password'));
        
        //'password' => Hash::make($request->password)
        $user = Registro::create($datosRegistro);
        
        $roles = 1;
        //$user->assignRole($roles);


        return redirect('login')->with('flash_message', 'Registro added!');
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
        $registro = Registro::findOrFail($id);

        return view('registro.show', compact('registro'));
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
        $registro = Registro::findOrFail($id);

        return view('registro.edit', compact('registro'));
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
        
        $registro = Registro::findOrFail($id);
        $registro->update($requestData);

        return redirect('registro')->with('flash_message', 'Registro updated!');
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
        Registro::destroy($id);

        return redirect('registro')->with('flash_message', 'Registro deleted!');
    }
}
