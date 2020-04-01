<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $empresa = Empresa::where('id', 'LIKE', "%$keyword%")
                ->orWhere('nombre_empresa', 'LIKE', "%$keyword%")
                ->orWhere('id_grupo', 'LIKE', "%$keyword%")
                ->orWhere('n_empresa_segundarias', 'LIKE', "%$keyword%")
                ->orWhere('logotipo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $empresa = Empresa::latest()->paginate($perPage);
        }

        return view('empresa.index', compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('empresa.create');
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
        $file = $request->file('logotipo');
        $requestData=request()->except('_token');//excluye el token de request
        
                if ($request->hasFile('logotipo')) {
            
                    $name=time().$file->getClientOriginalName();
        
        $requestData['formato']=$name;
        $empresa= $request->input('nombre_empresa');
        //$requestData['documento']=$request->file('documento')->store('uploads','public');
        $file->move(public_path().'/storage/uploads/empresas/'.$empresa.'/',$name);
        $requestData['logotipo']='uploads/empresas/'.$empresa."/".$name;
        $micarpeta = 'storage/uploads/empresas/'.$empresa."/";
            if (!file_exists($micarpeta)) {
                mkdir($micarpeta, 0777, true);
            }
///
                $fh = fopen($micarpeta."/index.php", 'w') or die("Se produjo un error al crear el archivo");
                $texto = <<<_END
                <script>window.history.back();</script>
                _END;
                fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
                fclose($fh);
                //echo "Se ha escrito sin problemas";
///



        }

        Empresa::create($requestData);

        return redirect('empresa')->with('flash_message', 'Empresa added!');
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
        $empresa = Empresa::findOrFail($id);

        return view('empresa.show', compact('empresa'));
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
        $empresa = Empresa::findOrFail($id);

        return view('empresa.edit', compact('empresa'));
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
                if ($request->hasFile('logotipo')) {
            $requestData['logotipo'] = $request->file('logotipo')
                ->store('uploads', 'public');
        }

        $empresa = Empresa::findOrFail($id);
        $empresa->update($requestData);

        return redirect('empresa')->with('flash_message', 'Empresa updated!');
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
        Empresa::destroy($id);

        return redirect('empresa')->with('flash_message', 'Empresa deleted!');
    }
}
