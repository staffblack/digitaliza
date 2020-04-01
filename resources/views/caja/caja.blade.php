@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Caja</div>
                    <div class="card-body">
                        <a href="{{ url('/caja/excel') }}" class="btn btn-success btn-sm" title="Add New Caja">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nueva Caja
                        </a>
<table>
    <tr>
        <form method="GET" action="{{ url('/caja/caja') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        <th>
            <div class="input-group">
                <input type="text" class="form-control" name="id" placeholder="Id..." value="{{ request('id') }}">
               
            </div>
    </th>
    <th>
            <div class="input-group">
                <input type="text" class="form-control" name="empresa" placeholder="empresa..." value="{{ request('empresa') }}">
              </div>
        
    </th>
    <th>
            <div class="input-group">
                <input type="text" class="form-control" name="sucursal" placeholder="Sucursal..." value="{{ request('sucursal') }}">
                
            </div>
        
    </th>
    <th>
           <div class="input-group">
                <input type="text" class="form-control" name="departamento" placeholder="Departamento..." value="{{ request('departamento') }}">
                
            </div>
       
    </th>
    <th>
         <div class="input-group">
                <input type="text" class="form-control" name="sub_departamento" placeholder="Sub departamento..." value="{{ request('sub_departamento') }}">
                
            </div>
    
    </th>
    <th>
            <div class="input-group">
                <input type="date" class="form-control" name="fecha_desde" title="fecha desde" placeholder="fechadesde..." value="{{ request('fecha_desde') }}">
        
            </div>
    </th>
    <th>
     <div class="input-group">
                <input type="date" title="fecha hasta" class="form-control" name="fecha_hasta" placeholder="fechahasta..." value="{{ request('fecha_hasta') }}">
               
            </div>
    </th>
    <th>
            <div class="input-group">
                <input type="date" class="form-control" name="fecha_vencimiento" placeholder="fecha vencimiento..." value="{{ request('fecha_vencimiento') }}">
               
            </div>
        
    </th>
        </tr>
    <tr>
        <th>
            <div class="input-group">
                <input type="text" class="form-control" name="secuencia_desde" placeholder="secuencia desde..." value="{{ request('secuencia_desde') }}">
               
            </div>
    </th>
    <th>
            <div class="input-group">
                <input type="text" class="form-control" name="secuencia_hasta" placeholder="secuencia hasta..." value="{{ request('secuencia_hasta') }}">
              </div>
        
    </th>
    <th>
            <div class="input-group">
                <input type="text" class="form-control" name="estado" placeholder="Estado..." value="{{ request('estado') }}">
                
            </div>
        
    </th>
    <th>
           <div class="input-group">
                <input type="text" class="form-control" name="codigo_verificacion" placeholder="Codigo..." value="{{ request('codigo_verificacion') }}">
                
            </div>
       
    </th>
    <th>
         <div class="input-group">
                <input type="text" class="form-control" name="etiqueta" placeholder="Etiqueta..." value="{{ request('etiqueta') }}">
                
            </div>
    
    </th>
    <th>
            <div class="input-group">
                <input type="text" class="form-control" name="ubicacion" title="Ubicacion" placeholder="Ubicacion..." value="{{ request('ubicacion') }}">
        
            </div>
    </th>
    <th>
     <div class="input-group">
                <input type="text" title="rack" class="form-control" name="rack" placeholder="Rack..." value="{{ request('rack') }}">
               
            </div>
    </th>
    <th>
            <div class="input-group">
                <input type="text" class="form-control" name="cuerpo" placeholder="Cuerpo..." value="{{ request('cuerpo') }}">
               
            </div>
        
    </th>
    <th><span class="input-group-append">
        <button class="btn btn-secondary" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span></th>
</form>
    </tr>
</table>
                        

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped {{ count($caja) > 0 ? 'datatable' : '' }} dt-select">
                                <thead>
                                    
                                    <tr>
                                        <th>Id</th>
                                        <th>Empresa</th>
                                        <th>Sucursal</th>
                                        <th>Departamento</th>
                                        <th>Sub Departamento</th>
                                        <th>Fecha desde</th>
                                        <th>fecha hasta</th>
                                        <th>Fecha de Vencimiento</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($caja as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><?php 
                                        include "conexion3.php";
                                        $registros = mysqli_query($conexion, "select * FROM empresa where id= '$item->empresa'") or
                                            die("Problemas en el select:" . mysqli_error($conexion));
                                            if ($reg = mysqli_fetch_array($registros)) {
                                                echo $reg['nombre_empresa'];
                                            }
                                        
                                        ?></th>
                                        <td><?php 
                                            include "conexion3.php";
                                            $registros = mysqli_query($conexion, "select * FROM sucursal where id= '$item->sucursal'") or
                                                die("Problemas en el select:" . mysqli_error($conexion));
                                                if ($reg = mysqli_fetch_array($registros)) {
                                                    echo $reg['nombre_sucursal'];
                                                }
                                            
                                            ?></th>
                                        <td><?php 
                                            include "conexion3.php";
                                            $registros = mysqli_query($conexion, "select * FROM departamento where id= '$item->departamento'") or
                                                die("Problemas en el select:" . mysqli_error($conexion));
                                                if ($reg = mysqli_fetch_array($registros)) {
                                                    echo $reg['nombre'];
                                                }
                                            
                                            ?></th>
                                        <td><?php 
                                            include "conexion3.php";
                                            $registros = mysqli_query($conexion, "select * FROM subdepartamento where id= '$item->sub_departamento'") or
                                                die("Problemas en el select:" . mysqli_error($conexion));
                                                if ($reg = mysqli_fetch_array($registros)) {
                                                    echo $reg['nombre'];
                                                }
                                            
                                            ?></th>
                                        <td>{{$item->fecha_desde}}</th>
                                        <td>{{$item->fecha_hasta}}</th>
                                        <td>{{$item->fecha_vencimiento}}</th>
                                            <td><?php 
                                                if($item->estado==1){
                                                    echo 'Bajo pedido';

                                                }
                                                
                                                ?></td>
                                        <td>    
                                            <a href="{{ url('/caja/' . $item->id) }}" title="View Caja"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                           
                                            <form method="POST" action="{{ url('/caja' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Caja" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $caja->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
