<?php include 'conexion3.php';?>
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.materias.materia')</h3>
    
    {!! Form::model($materia, ['method' => 'PUT', 'route' => ['admin.materia.update', $materia->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('id_curso', 'Curso*', ['class' => 'control-label']) !!}
					{!! Form::select('id_curso', $cursos, old('cursos'), ['class' => 'form-control select', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('id_curso'))
                        <p class="help-block">
                            {{ $errors->first('id_curso') }}
                        </p>
                    @endif
                </div>
            </div>			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('id_user', 'Docentes*', ['class' => 'control-label']) !!}
					

                    <select name="id_user" id="id_user" class="form-control">
                     <?php
                        $registros=mysqli_query($conexion,"select * from model_has_roles AS ro INNER JOIN users AS us ON ro.model_id=us.id WHERE ro.role_id='2'") or
                              die("Problemas en el select:".mysqli_error($conexion));

                            while ($reg=mysqli_fetch_array($registros))
                            {

                                
                      ?>
                        <option value="<?php echo $reg['id']?>"><?php echo $reg['name'].'  '.$reg['apellido']?></option>
                    <?php }?>
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('id_user'))
                        <p class="help-block">
                            {{ $errors->first('id_user') }}
                        </p>
                    @endif
                </div>
            </div>		
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('materia', 'Materia*', ['class' => 'control-label']) !!}
                    {!! Form::text('materia', old('materia'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}                    
                    <p class="help-block"></p>
                    @if($errors->has('materia'))
                        <p class="help-block">
                            {{ $errors->first('materia') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('periodo', 'Año Lectivo*', ['class' => 'control-label']) !!}
                    {!! Form::text('periodo', old('periodo'), ['id'=> 'periodo','class' => 'form-control', 'placeholder' => '', 'required' => '','readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('periodo'))
                        <p class="help-block">
                            {{ $errors->first('periodo') }}
                        </p>
                    @endif
                </div>
            </div>			
		
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

