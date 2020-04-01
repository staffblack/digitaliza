@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
         
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1>Usuarios</h1></div><br>
                    <div class="card-body">
                        <a href="{{ url('/usuario/create') }}" class="btn btn-success btn-sm" title="Agregar Nuevo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo
                        </a>

                        <form method="GET" action="{{ url('/usuario') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Telefono</th><th>Perfil</th><th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($usuario as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->apellido }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->telefono }}</td>
                                        <td>
                                            <?php
                                            if($item->perfil==1){
                                                echo 'Administrador';
                                            }elseif($item->perfil==2){
                                                echo 'Transportista';
                                            }elseif($item->perfil==3){
                                                echo 'cajera';
                                            }elseif($item->perfil==4){
                                                echo 'Cliente';
                                            }  
                                                ?>
                                            </td>
                                        <td>
                                            <a href="{{ url('/usuario/' . $item->id) }}" title="Ver"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/usuario/' . $item->id . '/edit') }}" title="Editar Usuario"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/usuario' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Usuario" onclick="return confirm(&quot;Confirm Eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $usuario->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
