@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Cuerpo</div>
                    <div class="card-body">
                        <a href="{{ url('/cuerpo/create') }}" class="btn btn-success btn-sm" title="Add New Cuerpo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                        </a>

                        <form method="GET" action="{{ url('/cuerpo') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Id</th><th>Cuerpo</th><th>Observacion</th><th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cuerpo as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td><td>{{ $item->cuerpo }}</td><td>{{ $item->observacion }}</td>
                                        <td>
                                            <a href="{{ url('/cuerpo/' . $item->id) }}" title="View Cuerpo"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/cuerpo/' . $item->id . '/edit') }}" title="Edit Cuerpo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/cuerpo' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Cuerpo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $cuerpo->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
