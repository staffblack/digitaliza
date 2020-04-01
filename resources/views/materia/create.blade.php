@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.materias.materia')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.materia.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
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
					{!! Form::select('id_user', $docentes, old('docentes'), ['class' => 'form-control select2', 'required' => '']) !!}
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
                    {!! Form::text('periodo', old('periodo'), ['id'=>'periodo', 'class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly']) !!}
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
