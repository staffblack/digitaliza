@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.notas.nota')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.nota.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
	
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('id_curso', 'Curso*', ['class' => 'control-label']) !!}
					{!! Form::select('id_curso', $cursos, old('cursos'), ['onchange' => 'cursoChange()','class' => 'form-control select', 'required' => '','id' =>'id_curso']) !!}
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
                    {!! Form::label('id_materia', 'Materia*', ['class' => 'control-label']) !!}
					{!! Form::select('id_materia', $materias, old('materias'), ['class' => 'form-control select', 'required' => '']) !!}
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
                    {!! Form::label('id_user', 'Estudiante*', ['class' => 'control-label']) !!}
					{!! Form::select('id_user', $estudiantes, old('estudiantes'), ['class' => 'form-control select2', 'required' => '','id' =>'id_user']) !!}
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
                    {!! Form::label('lapso', 'Lapso*', ['class' => 'control-label']) !!}
					{!! Form::select('lapso', array(1 => '1ER Quimestre', 2 => '2do Quimestre'), old('lapso'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lapso'))
                        <p class="help-block">
                            {{ $errors->first('lapso') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tipo', 'Tipo*', ['class' => 'control-label']) !!}
					{!! Form::select('tipo', array(1 => 'Parcial', 2 => 'Examen'), old('tipo'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tipo'))
                        <p class="help-block">
                            {{ $errors->first('tipo') }}
                        </p>
                    @endif
                </div>
            </div>			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('q1p1', 'Nota*', ['class' => 'control-label']) !!}
                    {!! Form::number('q1p1', old('q1p1'), ['min'=>'1','max'=>'10','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('q1p1'))
                        <p class="help-block">
                            {{ $errors->first('q1p1') }} 
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
function cursoChange() {
   console.log("Prueba");
		var id = $("#id_curso").val(); 
		
		console.log(id);
          $.ajax({
           url: '/admin/getMaterias/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){
			
			 console.log(response);
			var data = jQuery.parseJSON(JSON.stringify(response));
			var count = Object.keys(data).length;
			console.log(count);
            var len = 0;
             if(count > 0){
               len = count;
             }
             if(len > 0){
               // Read data and create <option >
               var id ="";
			   var name ="";
			   $("#id_materia").empty();
			   for(var i=0; i<len; i++){
 
				 $("#id_materia").append('<option value='+data[i].id+'>'+data[i].materia+'</option>');
				 //var select = document.getElementById("id_materia");
				 //console.log(select);
				 //select.append(option); 
               }
             }
           }
        }); 
		
          $.ajax({
           url: '/admin/getEstudiantes/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){
			
			 console.log(response);
			var data = jQuery.parseJSON(JSON.stringify(response));
			var count = Object.keys(data).length;
            var len = 0;
             if(count > 0){
               len = count;
             }			
             if(len > 0){
               // Read data and create <option >
               var id ="";
			   var name ="";
			   $("#id_user").empty();
			   for(var i=0; i<len; i++){
 
				$("#id_user").append('<option value='+data[i].id+'>'+data[i].name+'</option>');
				 //var select = document.getElementById("id_materia");
				 //console.log(select);
				 //select.append(option); 
               }
             }
           }
        }); 		
}

</script>
