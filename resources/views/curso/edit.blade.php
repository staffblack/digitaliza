@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cursos.curso')</h3>
    
    {!! Form::model($curso, ['method' => 'PUT', 'route' => ['admin.curso.update', $curso->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('curso', 'Curso*', ['class' => 'control-label']) !!}
					{!! Form::select('curso', array('Primero' => 'Primero', 'Segundo' => 'Segundo', 'Tercero' => 'Tercero', 'Cuarto' => 'Cuarto', 'Quinto' => 'Quinto', 'Sexto' => 'Sexto', 'Septimo' => 'Septimo'), old('curso'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('curso'))
                        <p class="help-block">
                            {{ $errors->first('curso') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('paralelo', 'Paralelo*', ['class' => 'control-label']) !!}
					{!! Form::select('paralelo', array('A' => 'A', 'B' => 'B', 'C' => 'C'), old('paralelo'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('paralelo'))
                        <p class="help-block">
                            {{ $errors->first('paralelo') }}
                        </p>
                    @endif
                </div>
            </div>			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('periodo', 'Periodo*', ['class' => 'control-label']) !!}
                    {!! Form::text('periodo', old('periodo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('periodo'))
                        <p class="help-block">
                            {{ $errors->first('periodo') }}
                        </p>
                    @endif
                </div>
            </div>				
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cupo', 'Cupo*', ['class' => 'control-label']) !!}
                    {!! Form::number('cupo', old('cupo'), ['min'=>'1','max'=>'30','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cupo'))
                        <p class="help-block">
                            {{ $errors->first('cupo') }}
                        </p>
                    @endif
                </div>
            </div>            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

