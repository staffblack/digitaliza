@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Evaluacion {{ $evaluacion->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/evaluacion') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/evaluacion/' . $evaluacion->id . '/edit') }}" title="Edit Evaluacion"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('evaluacion' . '/' . $evaluacion->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Evaluacion" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    
                                    <tr><th> Id </th><td> {{ $evaluacion->id }} </td></tr><tr></tr><tr><th> Id Grupo </th><td> {{ $evaluacion->id_grupo }} </td></tr>
                                <?php 
                                include 'conexion3.php';

                                $registros = mysqli_query($conexion, "select * from detalle_evaluacion where id_evaluacion = '$evaluacion->id'") or
    die("Problemas en el select:" . mysqli_error($conexion));

  while ($reg = mysqli_fetch_array($registros)) {
    ?>
    <tr><th> Pregunta: </th><td> {{ $reg['pregunta'] }} </td></tr>
    <?php

  }


                                ?>
                                
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
