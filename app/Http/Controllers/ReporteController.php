<?php

namespace App\Http\Controllers;

use DB;
use App\Materia;
use App\User;
use App\Curso;
use App\Matricula;
#use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreMateriasRequest;
use Spatie\Permission\Contracts\Role;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function docente()
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
		$materia = Materia::where('estado',1)->get()->pluck('id')->first();
		$users = User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->whereHas('materia',function($query)use ($materia){$query->where('id', $materia);})->get();
		$cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('curso','id');
		
        return view('reporte.docente', compact('users','cursos'));			
    }

    public function estudiante()
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
		$matricula = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('id')->first();
		$users = User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->whereHas('matricula',function($query)use ($matricula){$query->where('id_curso', $matricula);})->get();
		$cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('curso','id');
		
        return view('reporte.estudiante', compact('users','cursos'));		
    }

    public function getEstudiantes($id)
    {
        //
		$curso=(int)$id;
		$estudiantes= User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->whereHas('matricula',function($query)use ($id){$query->where('id_curso', $id);})->get();//->pluck('name','id');
	
		return json_encode($estudiantes);
    }

    public function getDocentes($id)
    {
        //
		//$curso=(int)$id;
		//$userlogin = Auth::user()->id;
		$docentes= User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->whereHas('materia',function($query)use ($id){$query->where('id_curso', $id);})->get();//->pluck('name','id');
	
		return json_encode($docentes);
    }	
	

}
