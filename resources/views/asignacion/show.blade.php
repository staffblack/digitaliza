@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Asignacion {{ $asignacion->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/asignacion') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/asignacion/' . $asignacion->id . '/edit') }}" title="Edit Asignacion"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('asignacion' . '/' . $asignacion->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Asignacion" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th> Titulo </th><td> {{ $asignacion->titulo }} </td></tr>
                                <tr>
                                    <th>  </th><td> {{ $asignacion->descripcion }} </td>
                                </tr>
                                <tr>
                                    <th>Descargar Pdf  </th><td> <a href="../storage/{{$asignacion->archivo}}" class="btn btn-primary" target="_blank">(Descargar)</a> </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
