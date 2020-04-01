@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.matriculas.matricula')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.matricula.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
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
                    {!! Form::label('id_curso', 'Curso*', ['class' => 'control-label']) !!}
					{!! Form::select('id_curso', $cursos, old('cursos'), ['onchange' =>'cursoChange()','id' => 'id_curso','class' => 'form-control select', 'required' => '']) !!}
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
                    {!! Form::number('cupo', old('cupo'), ['min'=>'1','max'=>'30','id'=> 'cupo','class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly']) !!}
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
                    {!! Form::text('ano_lectivo', old('ano_lectivo'), ['id' => 'ano_lectivo','class' => 'form-control', 'placeholder' => '', 'required' => '', 'readonly']) !!}
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
	$("#ano_lectivo").val(yyyy);
	$("#cupo").val( <?php echo $cupo ?>);

    $('#cupo').keypress(function(e) {
        preventNumberInput(e);
    });
	
});


function cursoChange() {
   console.log("Prueba");
		var id = $("#id_curso").val(); 
		
		console.log(id);
          $.ajax({
           url: '/admin/getCupo/'+id,
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
			   $("#cupo").empty();
			   for(var i=0; i<len; i++){
 
				$("#cupo").val(data[i].cupo);
				 //var select = document.getElementById("id_materia");
				 //console.log(select);
				 //select.append(option); 
               }
             }
           }
        });
}		
</script>
