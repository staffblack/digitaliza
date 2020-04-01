<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Nota;
use App\Curso;
use App\User;
use App\Materia;
use App\Parametro;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Carbon\Carbon;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ( !Gate::allows('calificar')) {
            return abort(401);
        }
		$userlogin = Auth::user()->id;
		$curso = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->whereHas('materias',function($query)use ($userlogin){$query->where('id_user', $userlogin);})->first();
		if ($curso === null) {
			// user doesn't exist
			$curso = [];
		    $materia = [];
			$notas = [];
			$estudiantes = [];
			$cursos = [];
			$materias = [];
		}else{
			$curso = $curso->id;
			$materia = Materia::select('materia','id')->whereHas('curso',function($query)use ($curso){$query->where('id_curso', $curso);})->first();
			$materia = $materia->id;		
			$notas = Nota::where('id_curso', $curso)->where('id_materia', $materia)->get();//[];//Nota::all();
			$estudiantes = [];//User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->whereHas('matricula',function($query)use ($curso){$query->where('id_curso', $curso);})->pluck('name','id'); //User::role('Estudiante')->get();
			$cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('curso','id');
			$materias = Materia::select('materia','id')->whereHas('curso',function($query)use ($curso){$query->where('id_curso', $curso);})->pluck('materia','id');			
		}

        return view('nota.index',compact('notas','estudiantes','cursos','materias'));	
    }

    public function buscarnotas($curso)
    {
        //
        if (! Gate::allows('calificar')) {
            return abort(401);
        }
		$userlogin = Auth::user()->id;
		$notas = Nota::get()->where('id_user', $userlogin)->where('id_curso', $curso);
		$cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->whereHas('materias',function($query){$query->where('id_user', 1);})->pluck('curso','id');
		$estudiantes = User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->get()->pluck('name','id'); //User::role('Estudiante')->get();
        //$cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('curso','id');
		$materias = Materia::select('materia','id')->whereHas('curso',function($query)use ($curso){$query->where('id_curso', $curso);})->pluck('materia','id');//Materia::get()->where('id_user', $userlogin)->pluck('materia', 'id');
        return view('nota.index',compact('notas','estudiantes','cursos','materias'));
    }	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (! Gate::allows('calificar')) {
            return abort(401);
        }
				
		$userlogin = Auth::user()->id;
		$curso = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->whereHas('materias',function($query)use ($userlogin){$query->where('id_user', $userlogin);})->first();
		if ($curso === null) {
			$estudiantes = [];
			$cursos = [];
			$materias = [];
		}else{

			
			$curso = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->whereHas('materias',function($query)use ($userlogin){$query->where('id_user', $userlogin);})->first()->id;
			$estudiantes = User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->whereHas('matricula',function($query)use ($curso){$query->where('id_curso', $curso);})->pluck('name','id'); //User::role('Estudiante')->get();
			//$cursos = Materia::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get()->pluck('curso','id');
			//$cursos = Materia::with(array('curso'=>function($query){$query->select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id');}))->get()->where('id_user', $userlogin)->pluck('curso.curso','id');
			$cursos = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->whereHas('materias',function($query){$query->where('id_user', 1);})->pluck('curso','id');
			$materias = Materia::select('materia','id')->whereHas('curso',function($query)use ($curso){$query->where('id_curso', $curso);})->pluck('materia','id');//Materia::get()->where('id_user', $userlogin)->pluck('materia', 'id');		
			
		}		

        return view('nota.create',compact('estudiantes','cursos','materias'));		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
	$primerparcial = Parametro::where('id', 1)->get();
	$segundoparcial = Parametro::where('id', 2)->get();
	$fechaactual = date("Y-m-d");
	if($fechaactual >= $primerparcial[0]->desde && $fechaactual <= $primerparcial[0]->hasta ||  $fechaactual >= $segundoparcial[0]->desde  && $fechaactual <=$segundoparcial[0]->hasta){	
		
		//$request->request->add(['id_curso' => $request->id_curso]);
		if($request->input('lapso')== 1 && $request->input('tipo')== 1){
			$request->request->add(['q1p2' => 0]);
			$request->request->add(['q1p3' => 0]);
			$request->request->add(['q1exam' => 0]);
			$request->request->add(['q2p1' => 0]);
			$request->request->add(['q2p2' => 0]);
			$request->request->add(['q2p3' => 0]);
			$request->request->add(['q2exam' => 0]);
			$count = Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->count();
			if ($count > 0) {
		// user found
				if (Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->where('q1p2', '=', 0)->count() > 0){
					Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->update(['q1p2' => $request->input('q1p1')]);
					return redirect()->route('admin.nota.index');
				}
				if(Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->where('q1p3', '=', 0)->count() > 0){
					Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->update(['q1p3' => $request->input('q1p1')]);
					return redirect()->route('admin.nota.index');
				}
				
			}else{				
				$nota = Nota::create($request->all());
				return 'Hola';//redirect()->route('admin.nota.index');
			}
		}
		if($request->input('lapso')== 2 && $request->input('tipo')== 1){
			$count = Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->count();
			if ($count > 0) {
				if (Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->where('q2p1', '=', 0)->count() > 0){
					Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->update(['q2p1' => $request->input('q1p1')]);
					return redirect()->route('admin.nota.index');
				}
				if (Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->where('q2p2', '=', 0)->count() > 0){
					Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->update(['q2p2' => $request->input('q1p1')]);
					return redirect()->route('admin.nota.index');
				}
				if (Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->where('q2p3', '=', 0)->count() > 0){
					Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->update(['q2p3' => $request->input('q1p1')]);
					return redirect()->route('admin.nota.index');
				}				
			}
		}
		if($request->input('tipo')== 2 ){
			$count = Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->count();
			if($request->lapso= 1){
				if ($count > 0) {
					if (Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->where('q1exam', '=', 0)->count() > 0){
						Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->update(['q1exam' => $request->input('q1p1')]);
						return redirect()->route('admin.nota.index');
					}									
				}
			}	
			if($request->input('lapso')== 2){
				if ($count > 0) {
					if (Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->where('q2exam', '=', 0)->count() > 0){
						Nota::where('id_user', '=', $request->input('id_user'))->where('id_curso', '=', $request->input('id_curso'))->where('id_materia', '=', $request->input('id_materia'))->update(['q2exam' => $request->input('q1p1')]);
						return redirect()->route('admin.nota.index');
					}				
				}	
			}			
		}
	}else{
		return redirect()->route('admin.nota.index');
	}		
		//return $request->tipo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    public function getNotas($id,$materia)
    {
        //
		//$notas =  Nota::where('id_curso', (int)$id)->where('id_materia', (int)$materia)->get();
		$notas =  Nota::with(array('user'=>function($query){$query->select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id');}))->where('id_curso', (int)$id)->where('id_materia', (int)$materia)->get();
		return json_encode($notas);
    }	

    public function getCurso($id)
    {
        //
		$userlogin = Auth::user()->id;
		$curso = Curso::select(DB::raw("CONCAT(curso,' ', paralelo) AS curso"),'id')->get();
		return json_encode($curso);
    }

    public function getMaterias($id)
    {
        $curso=(int)$id;
		$materias = Materia::select('materia','id')->whereHas('curso',function($query)use ($curso){$query->where('id_curso', $curso);})->get();//->pluck('materia','id');
		return json_encode($materias);
    }	

    public function getEstudiantes($id)
    {
        //
		$curso=(int)$id;
		$userlogin = Auth::user()->id;
		$estudiantes= User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->whereHas('matricula',function($query)use ($curso){$query->where('id_curso', $curso);})->get();//->pluck('name','id');
	
		return json_encode($estudiantes);
    }	
	

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		
        if (! Gate::allows('calificar')) {
            return abort(401);
        }		
        $nota = Nota::findOrFail($id);
	
		return view('nota.edit',compact('nota'));	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if (! Gate::allows('calificar')) {
            return abort(401);
        }
		$primerparcial = Parametro::where('id', 1)->get();
		$segundoparcial = Parametro::where('id', 2)->get();
		$fechaactual = date("Y-m-d");
		if($fechaactual >= $primerparcial[0]->desde && $fechaactual <= $primerparcial[0]->hasta ||  $fechaactual >= $segundoparcial[0]->desde  && $fechaactual <=$segundoparcial[0]->hasta){		
			$nota = Nota::findOrFail($id);
			$nota->update($request->all());
			return redirect()->route('admin.nota.index');
		}else{
			return redirect()->route('admin.nota.index');
		}	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('calificar')) {
            return abort(401);
        }
        $nota = Nota::findOrFail($id);
        $nota->delete();

        return redirect()->route('admin.nota.index');
    }
	
    public function reporte()
    {
        //
        if (! Gate::allows('calificar')) {
            return abort(401);
        }
        return view('nota.reporte');			
    }

    public function estudiante()
    {
        //
        if (! Gate::allows('notas')) {
            return abort(401);
        }
		$user = Auth::user()->id;
		$notas = Nota::where('id_user',$user)->get();
        return view('nota.estudiante',compact('notas'));	
    }	
	
}
