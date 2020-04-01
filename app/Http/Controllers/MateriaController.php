<?php

namespace App\Http\Controllers;

use DB;
use App\Materia;
use App\User;
use App\Curso;
use Illuminate\Http\Request;
#use Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreMateriasRequest;
use Spatie\Permission\Contracts\Role;


class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index()
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
		$materias = Materia::all();
		
        return view('materia.index', compact('materias'));			
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
		//$cursos = Curso::select(CONCAT(curso, " ", paralelo) "curso",'id')->pluck('curso', 'id');
		//$user->hasRole('writer'); 
		#$docentes = User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->get()->pluck('name','id'); //User::role('Estudiante')->get();
        $docentes = User::role('Docente')->get()->pluck('name','id');
        $cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('curso','id');
		return view('materia.create', compact('cursos','docentes'));			
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateriasRequest $request)
    {
        //
		$request->request->add(['estado' => 0]);
        $materia = Materia::create($request->all());
        
        return redirect()->route('admin.materia.index');		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $materia = Materia::findOrFail($id);
		$docentes = User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->get()->pluck('name','id'); //User::role('Estudiante')->get();
        $cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('curso','id');		

        return view('materia.edit', compact('materia','cursos','docentes'));		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $materia = Materia::findOrFail($id);
		$request->request->add(['estado' => 0]);
        $materia->update($request->all());

        return redirect()->route('admin.materia.index');				
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $materia = Materia::findOrFail($id);
        $materia->delete();

        return redirect()->route('admin.materia.index');
    }
	
}
