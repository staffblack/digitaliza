@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Usuario {{ $usuario->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/usuario') }}" title="Volver">
                            <button class="btn btn-warning btn-sm">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/usuario/' . $usuario->id . '/edit') }}" title="Edit Usuario">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('usuario' . '/' . $usuario->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Usuario" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Id </th><td> {{ $usuario->id }} </td></tr>
                                    <tr><th> Nombre </th><td> {{ $usuario->nombre }} </td></tr>
                                    <tr><th> Apellido </th><td> {{ $usuario->apellido }} </td></tr>
                                    <tr><th> Email </th><td> {{ $usuario->email }} </td></tr>
                                    <tr><th> Edad </th><td> {{ $usuario->edad }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
