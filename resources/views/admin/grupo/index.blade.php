@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Grupo</h3>
<div class="card-body">
    <a href="{{ url('/grupo/create') }}" class="btn btn-success btn-sm" title="Add New Grupo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Grupo
                        </a>

                        <form method="GET" action="{{ url('/grupo') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="panel-body table-responsive">
                            <table class="table table-bordered table-striped  dt-select">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Periodo Electivo</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grupo as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td><td>{{ $item->nombre }}</td><td>{{ $item->periodo_electivo }}</td>
                                        <td>
                                            <a href="{{ url('/grupo/' . $item->id) }}" title="Ver Grupo"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/grupo/' . $item->id . '/edit') }}" title="Editar Grupo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/grupo' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Grupo" onclick="return confirm(&quot;Confirma Eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $grupo->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

</div>

@endsection
