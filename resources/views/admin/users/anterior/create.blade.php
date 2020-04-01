@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <input type="hidden" name="name" value="0">
            <input type="hidden" name="apellido" value="0">
            <input type="hidden" name="edad" value="0">
            <input type="hidden" name="identificacion" value="<?php   echo date("YmdhsH");?>">">
            <input type="hidden" name="sexo" value="0">
            <input type="hidden" name="telefono" value="0"><?php//   echo date("YmdhsH");?>
            		
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
                    {!! Form::label('id_grupo', 'grupo*', ['class' => 'control-label']) !!}
                    {!! Form::text('id_grupo', old('id_grupo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('id_grupo'))
                        <p class="help-block">
                            {{ $errors->first('id_grupo') }}
                        </p>
                    @endif
                </div>
            </div>
            <input type="hidden" name="perfil" value="2">
            
            <input type="hidden" name="password" value="<?php
            echo('123456');
            ?>">
            <input type="hidden" name="roles" value="3">
            <input type="hidden" name="representante" value="0">
            <input type="hidden" name="telefono_represen" value="0">
                  
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

