@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Empresa</div>
                    <div class="card-body">
                        <a href="{{ url('/empresa/create') }}" class="btn btn-success btn-sm" title="Add New Empresa">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nueva Empresa
                        </a>

                        <form method="GET" action="{{ url('/empresa') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Logotipo</th><th>Id</th><th>Nombre Empresa</th><th>Id Grupo</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($empresa as $item)
                                    <tr>
                                        <td><img src="storage/{{ $item->logotipo }}" width="30%"></td>
                                        <td>{{ $item->id }}</td><td>{{ $item->nombre_empresa }}</td><td>{{ $item->id_grupo }}</td>
                                        <td>
                                            <a href="{{ url('/empresa/' . $item->id) }}" title="View Empresa"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/empresa/' . $item->id . '/edit') }}" title="Edit Empresa"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/empresa' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Empresa" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $empresa->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
