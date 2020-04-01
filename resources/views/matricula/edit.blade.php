@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.matriculas.matricula')</h3>
    
    {!! Form::model($matricula, ['method' => 'PUT', 'route' => ['admin.matricula.update', $matricula->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">


            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('id_user', 'Estudiante*', ['class' => 'control-label']) !!}
					{!! Form::select('id_user', $estudiantes, old('estudiantes'), ['class' => 'form-control select2', 'required' => '']) !!}
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
                    {!! Form::label('id_curso', 'Materia*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('cupo', 'Cupo*', ['class' => 'control-label']) !!}
                    {!! Form::text('cupo', old('cupo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cupo'))
                        <p class="help-block">
                            {{ $errors->first('cupo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ano_lectivo', 'Año Lectivo*', ['class' => 'control-label']) !!}
                    {!! Form::text('ano_lectivo', old('ano_lectivo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ano_lectivo'))
                        <p class="help-block">
                            {{ $errors->first('ano_lectivo') }}
                        </p>
                    @endif
                </div>
            </div>		
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

