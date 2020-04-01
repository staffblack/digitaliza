<?php

namespace App\Http\Controllers;

use DB;
use App\Matricula;
use App\Curso;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMatriculasRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class MatriculaController extends Controller
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
		
		$matriculas = Matricula::all();
		
        return view('matricula.index',compact('matriculas'));	
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
		//$estudiantes = User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->get()->pluck('name','id'); //User::role('Estudiante')->get();
		$estudiantes = User::role('Estudiante')->get()->pluck('name','id');
        $cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('curso','id');
		$cupo = Curso::select('cupo')->first()->cupo;
		return view('matricula.create', compact('cursos','estudiantes','cupo'));
		//return $cupo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreMatriculasRequest $request)
	public function store(Request $request)
    {
        //
		$input  = request()->validate([

                'cupo' => 'numeric|min:1|max:30',

            ]);
		
		$request->request->add(['estado' => 0]);
		$cupo = $request['cupo'] -1;
        $curso = Curso::findOrFail($request['id_curso'])->update(['cupo'=> $cupo]);	
        $input  = $request->all();
		$matricula = Matricula::create($input);	
        return redirect()->route('admin.matricula.index');	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $matricula = Matricula::findOrFail($id);
		$estudiantes = User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->get()->pluck('name','id'); //User::role('Estudiante')->get();
        $cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('curso','id');		

        return view('matricula.edit', compact('matricula','cursos','estudiantes'));		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $matricula = Matricula::findOrFail($id);
        $matricula->update($request->all());

        return redirect()->route('admin.matricula.index');		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return redirect()->route('admin.matricula.index');
    }

    public function getCupo($id)
    {
        $curso=(int)$id;
		$curso = Curso::where('id',$curso)->get();//->pluck('materia','id');
		return json_encode($curso);
    }	
	
}
