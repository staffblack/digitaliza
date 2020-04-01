@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.notas.nota')</h3>
    
    {!! Form::model($nota, ['method' => 'PUT', 'route' => ['admin.nota.update', $nota->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">

	
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::hidden('id_user', old('id_user'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::hidden('id_curso', old('id_curso'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::hidden('id_materia', old('id_materia'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('id_materia'))
                        <p class="help-block">
                            {{ $errors->first('id_materia') }}
                        </p>
                    @endif
                </div>
            </div>			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('q1p1', 'Quimestre 1 parcial 1*', ['class' => 'control-label']) !!}
                    {!! Form::number('q1p1', old('q1p1'), ['min'=>'1','max'=>'10','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('q1p1'))
                        <p class="help-block">
                            {{ $errors->first('q1p1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('q1p2', 'Quimestre 1 parcial 2*', ['class' => 'control-label']) !!}
                    {!! Form::number('q1p2', old('q1p2'), ['min'=>'1','max'=>'10','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('q1p2'))
                        <p class="help-block">
                            {{ $errors->first('q1p2') }}
                        </p>
                    @endif
                </div>
            </div>	
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('q1p3', 'Quimestre 1 parcial 3*', ['class' => 'control-label']) !!}
                    {!! Form::number('q1p3', old('q1p3'), ['min'=>'1','max'=>'10','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('q1p3'))
                        <p class="help-block">
                            {{ $errors->first('q1p3') }}
                        </p>
                    @endif
                </div>
            </div>	
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('q1exam', 'Examen Quimestre 1*', ['class' => 'control-label']) !!}
                    {!! Form::number('q1exam', old('q1exam'), ['min'=>'1','max'=>'10','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('q1exam'))
                        <p class="help-block">
                            {{ $errors->first('q1exam') }}
                        </p>
                    @endif
                </div>
            </div>	
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('q2p1', 'Quimestre 2 parcial 1*', ['class' => 'control-label']) !!}
                    {!! Form::number('q2p1', old('q2p1'), ['min'=>'1','max'=>'10','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('q2p1'))
                        <p class="help-block">
                            {{ $errors->first('q2p1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('q2p2', 'Quimestre 2 parcial 2*', ['class' => 'control-label']) !!}
                    {!! Form::number('q2p2', old('q2p2'), ['min'=>'1','max'=>'10','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('q2p2'))
                        <p class="help-block">
                            {{ $errors->first('q2p2') }}
                        </p>
                    @endif
                </div>
            </div>	
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('q2p3', 'Quimestre 2 parcial 3*', ['class' => 'control-label']) !!}
                    {!! Form::number('q2p3', old('q2p3'), ['min'=>'1','max'=>'10','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('q2p3'))
                        <p class="help-block">
                            {{ $errors->first('q2p3') }}
                        </p>
                    @endif
                </div>
            </div>	
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('q2exam', 'Examen Quimestre 2*', ['class' => 'control-label']) !!}
                    {!! Form::number('q2exam', old('q2exam'), ['min'=>'1','max'=>'10','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('q2exam'))
                        <p class="help-block">
                            {{ $errors->first('q2exam') }}
                        </p>
                    @endif
                </div>
            </div>				
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

