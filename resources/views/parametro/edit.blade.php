@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>
    
    {!! Form::model($parametro, ['method' => 'PUT', 'route' => ['admin.parametro.update', $parametro->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('descripcion', 'Descripcion*', ['class' => 'control-label']) !!}
                    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('descripcion'))
                        <p class="help-block">
                            {{ $errors->first('descripcion') }}
                        </p>
                    @endif
                </div>
            </div>		
		
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('desde', 'Desde*', ['class' => 'control-label']) !!}
					{!! Form::date('desde',old('desde'), ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('desde'))
                        <p class="help-block">
                            {{ $errors->first('desde') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('hasta', 'Hasta*', ['class' => 'control-label']) !!}
					{!! Form::date('hasta',old('hasta'), ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('hasta'))
                        <p class="help-block">
                            {{ $errors->first('hasta') }}
                        </p>
                    @endif
                </div>
            </div>			
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

