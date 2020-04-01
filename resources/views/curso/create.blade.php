@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cursos.curso')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.curso.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
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
                    {!! Form::text('periodo', old('periodo'), ['id'=> 'periodo','class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly']) !!}
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

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1; //January is 0!

	var yyyy = today.getFullYear();
	if (dd < 10) {
		dd = '0' + dd;
	} 
	if (mm < 10) {
		mm = '0' + mm;
	} 
	var today = dd + '/' + mm + '/' + yyyy;
	$("#periodo").val(yyyy);
});
</script>