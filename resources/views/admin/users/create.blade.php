@extends('layouts.app2')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Nombre*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('apellido', 'Apellido*', ['class' => 'control-label']) !!}
                    {!! Form::text('apellido', old('apellido'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('apellido'))
                        <p class="help-block">
                            {{ $errors->first('apellido') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('edad', 'Edad*', ['class' => 'control-label']) !!}
                    {!! Form::number('edad', old('edad'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('edad'))
                        <p class="help-block">
                            {{ $errors->first('edad') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('identificacion', 'Identificacion*', ['class' => 'control-label']) !!}
                    {!! Form::text('identificacion', old('identificacion'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('identificacion'))
                        <p class="help-block">
                            {{ $errors->first('identificacion') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sexo', 'Sexo*', ['class' => 'control-label']) !!}
					{!! Form::select('sexo', array('m' => 'Masuculino', 'f' => 'Femenino', 'na' => 'Nada'), old('sexo'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sexo'))
                        <p class="help-block">
                            {{ $errors->first('sexo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telefono', 'Telefono*', ['class' => 'control-label']) !!}
                    {!! Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('telefono'))
                        <p class="help-block">
                            {{ $errors->first('telefono') }}
                        </p>
                    @endif
                </div>
            </div>			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
                    <input type="hidden" name="roles" value="1">
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('representante', 'Representante de la Empresa', ['class' => 'control-label']) !!}
                    {!! Form::text('representante', old('representante'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('representante'))
                        <p class="help-block">
                            {{ $errors->first('representante') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telefono_represen', 'Telefono Representante*', ['class' => 'control-label']) !!}
                    {!! Form::text('telefono_represen', old('telefono_represen'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('telefono_represen'))
                        <p class="help-block">
                            {{ $errors->first('telefono_represen') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('id_grupo', 'Grupo', ['class' => 'control-label']) !!}
                    {!! Form::text('id_grupo', old('id_grupo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('id_grupo'))
                        <p class="help-block">
                            {{ $errors->first('id_grupo') }}
                        </p>
                    @endif
                </div>
            </div>        
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('perfil', 'Perfil', ['class' => 'control-label']) !!}
                    {!! Form::text('perfil', old('perfil'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('perfil'))
                        <p class="help-block">
                            {{ $errors->first('perfil') }}
                        </p>
                    @endif
                </div>
            </div>      
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

