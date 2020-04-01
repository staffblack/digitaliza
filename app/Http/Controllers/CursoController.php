<?php

namespace App\Http\Controllers;

#use DB;
#use App\Curso;
#use App\User;
#use Spatie\Permission\Models\Role;
#use Illuminate\Http\Request;
#use Illuminate\Support\Facades\Gate;
#use Illuminate\Support\Facades\Validator;
#use App\Http\Requests\Admin\StoreCursosRequest;
use DB;
use App\Materia;
use App\User;
use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreCursosRequest;
use Spatie\Permission\Contracts\Role;

class CursoController extends Controller
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

        $cursos = Curso::all();

        return view('curso.index', compact('cursos'));		
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
        //$roles = Role::get()->pluck('name', 'name');
        //, compact('roles')
        return view('curso.create');		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCursosRequest $request)
    {
        //
		$request->request->add(['estado' => 1]);
        $curso = Curso::create($request->all());
 
        return redirect()->route('admin.curso.index');		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
		$curso = Curso::findOrFail($id);
		return view('curso.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
		$request->request->add(['estado' => 1]);
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());

        return redirect()->route('admin.curso.index');		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('admin.curso.index');
    }
}
