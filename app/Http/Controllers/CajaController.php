<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Caja;
use App\Empresa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $id = $request->get('id');
        $empresa = $request->get('empresa');
        $sucursal = $request->get('sucursal');
        $departamento = $request->get('departamento');
        $sub_departamento = $request->get('sub_departamento');
        $detalle = $request->get('detalle');
        $sub_detalle = $request->get('sub_detalle');
        $fecha_desde = $request->get('fecha_desde');
        $fecha_hasta = $request->get('fecha_hasta');
        $fecha_vencimiento = $request->get('fecha_vencimiento');
        $sub_detalle = $request->get('sub_detalle');
        $secuencia_desde=$request->get('sub_detalle');
        $secuencia_hasta=$request->get('sub_detalle');
        $estado=$request->get('sub_detalle');
        $codigo_verificacion =$request->get('sub_detalle');
        $etiqueta=$request->get('etiqueta');
        $ubicacion=$request->get('ubicacion');
        $rack=$request->get('rack');
        $cuerpo=$request->get('cuerpo');
        $perPage = 10;

        if(($id!=Null)or
        ($empresa!=Null)or
        ($sucursal!=Null)or
        ($departamento!=Null)or
        ($sub_departamento!=Null)or
        ($sub_detalle!=Null)or
        ($fecha_desde!=Null)or
        ($fecha_hasta!=Null)or
        ($fecha_vencimiento!=Null)or
        ($secuencia_desde!=Null)or
        ($secuencia_hasta!=Null)or
        ($estado!=Null)or
        ($codigo_verificacion!=Null)or
        ($etiqueta!=Null)or
        ($ubicacion!=Null)or
        ($rack!=Null)or
        ($cuerpo!=Null)){
            
            $caja = Caja:://where('id', 'LIKE', "%$id%")
                //->orWhere('empresa', 'LIKE', "%$keyword%")
                //->orWhere('sucursal', 'LIKE', "%$keyword%")
                //->orWhere('departamento', 'LIKE', "%$keyword%")
                //->orWhere('sub_departamento', 'LIKE', "%$keyword%")
                //->orWhere('detalle', 'LIKE', "%$keyword%")
                //->orWhere('sub_detalle', 'LIKE', "%$keyword%")
                  orWhere('fecha_desde', 'LIKE', "%$fecha_desde%")
                //->orWhere('fecha_hasta', 'LIKE', "%$keyword%")
                //->orWhere('fecha_vencimiento', 'LIKE', "%$keyword%")
                //->orWhere('secuencia_desde', 'LIKE', "%$keyword%")
                //->orWhere('secuencia_hasta', 'LIKE', "%$keyword%")
                //->orWhere('estado', 'LIKE', "%$keyword%")
                //->orWhere('codigo_verificacion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        

        }else{
            $caja = Caja::latest()->paginate($perPage);
        }
        
        return view('caja.index', compact('caja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $empresa = DB::table('empresa')
                    ->get();
                    
        #$empresa= Empresa::All();
        #return view('caja.create',compact('empresa'));
        return view('caja.create')->with('empresa');
    }

    public function excel()
    {
        
        return view('caja.excel');
    }

    public function caja(Request $request)
    {
        $value = $request->session()->get('idgrupo');
        


        $keyword = $request->get('search');
        $id = $request->get('id');
        $empresa = $request->get('empresa');
        $sucursal = $request->get('sucursal');
        $departamento = $request->get('departamento');
        $sub_departamento = $request->get('sub_departamento');
        $detalle = $request->get('detalle');
        $sub_detalle = $request->get('sub_detalle');
        $fecha_desde = $request->get('fecha_desde');
        $fecha_hasta = $request->get('fecha_hasta');
        $fecha_vencimiento = $request->get('fecha_vencimiento');
        $sub_detalle = $request->get('sub_detalle');
        $secuencia_desde=$request->get('sub_detalle');
        $secuencia_hasta=$request->get('sub_detalle');
        $estado=$request->get('sub_detalle');
        $codigo_verificacion =$request->get('sub_detalle');
        $etiqueta=$request->get('etiqueta');
        $ubicacion=$request->get('ubicacion');
        $rack=$request->get('rack');
        $cuerpo=$request->get('cuerpo');
        $perPage = 10;

        if(($id!=Null)or
        ($empresa!=Null)or
        ($sucursal!=Null)or
        ($departamento!=Null)or
        ($sub_departamento!=Null)or
        ($sub_detalle!=Null)or
        ($fecha_desde!=Null)or
        ($fecha_hasta!=Null)or
        ($fecha_vencimiento!=Null)or
        ($secuencia_desde!=Null)or
        ($secuencia_hasta!=Null)or
        ($estado!=Null)or
        ($codigo_verificacion!=Null)or
        ($etiqueta!=Null)or
        ($ubicacion!=Null)or
        ($rack!=Null)or
        ($cuerpo!=Null)){
            
            $caja = Caja:://where('id', 'LIKE', "%$id%")
                //->orWhere('empresa', 'LIKE', "%$keyword%")
                //->orWhere('sucursal', 'LIKE', "%$keyword%")
                //->orWhere('departamento', 'LIKE', "%$keyword%")
                //->orWhere('sub_departamento', 'LIKE', "%$keyword%")
                //->orWhere('detalle', 'LIKE', "%$keyword%")
                //->orWhere('sub_detalle', 'LIKE', "%$keyword%")
                  orWhere('fecha_desde', 'LIKE', "%$fecha_desde% and empresa = '$value'")
                //->orWhere('fecha_hasta', 'LIKE', "%$keyword%")
                //->orWhere('fecha_vencimiento', 'LIKE', "%$keyword%")
                //->orWhere('secuencia_desde', 'LIKE', "%$keyword%")
                //->orWhere('secuencia_hasta', 'LIKE', "%$keyword%")
                //->orWhere('estado', 'LIKE', "%$keyword%")
                //->orWhere('codigo_verificacion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        
                $caja = Caja::where('empresa', '=', "$value")
                ->latest()->paginate($perPage);
        }else{
            $caja = Caja::where('empresa', '=', "$value")
                ->latest()->paginate($perPage);
        }
        
        return view('caja.caja', compact('caja'));
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
        $file = $request->file('etiqueta');
        $requestData=request()->except('_token');//excluye el token de request
        
                if ($request->hasFile('etiqueta')) {
            
                    $name=time().$file->getClientOriginalName();
        
        $requestData['formato']=$name;
        $empresa= $request->input('nombre_empresa');
        //$requestData['documento']=$request->file('documento')->store('uploads','public');
        $file->move(public_path().'/storage/uploads/empresas/'.$empresa.'/',$name);
        $requestData['etiqueta']='uploads/empresas/'.$empresa."/".$name;
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




        
        //$requestData = $request->all();
        
        Caja::create($requestData);

        return redirect('caja')->with('flash_message', 'Caja added!');
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
        $caja = Caja::findOrFail($id);

        return view('caja.show', compact('caja'));
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
        $caja = Caja::findOrFail($id);

        return view('caja.edit', compact('caja'));
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
        
        $caja = Caja::findOrFail($id);
        $caja->update($requestData);

        return redirect('caja')->with('flash_message', 'Caja updated!');
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
        Caja::destroy($id);

        return redirect('caja')->with('flash_message', 'Caja deleted!');
    }
}
