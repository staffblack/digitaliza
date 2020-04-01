@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Sucursal {{ $sucursal->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/sucursal') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/sucursal/' . $sucursal->id . '/edit') }}" title="Edit Sucursal"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sucursal' . '/' . $sucursal->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sucursal" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sucursal->id }}</td>
                                    </tr>
                                    <tr><th> Id </th><td> {{ $sucursal->id }} </td></tr><tr><th> Id Empresa </th><td> {{ $sucursal->id_empresa }} </td></tr><tr><th> Nombre Sucursal </th><td> {{ $sucursal->nombre_sucursal }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
