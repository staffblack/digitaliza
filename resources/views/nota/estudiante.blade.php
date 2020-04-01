@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<?php include 'conexion3.php';?>
    <h3 class="page-title">@lang('global.notas.nota')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>
			
		
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($notas) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
						<th colspan="7">1ER QUIMESTRE</th>
                        <th colspan="7">2DO QUIMESTRE</th>
                    </tr>				
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
						<th>Materia</th>
						<th>@lang('global.notas.fields.estudiante')</th>
                        <th>@lang('global.notas.fields.p1')</th>
                        <th>@lang('global.notas.fields.p2')</th>
						<th>@lang('global.notas.fields.p3')</th>
						<th>@lang('global.notas.fields.prom')</th>
						<th>@lang('global.notas.fields.exam')</th>
						<th>@lang('global.notas.fields.promg')</th>
                        <th>@lang('global.notas.fields.p1')</th>
                        <th>@lang('global.notas.fields.p2')</th>
						<th>@lang('global.notas.fields.p3')</th>
						<th>@lang('global.notas.fields.prom')</th>
						<th>@lang('global.notas.fields.exam')</th>
						<th>@lang('global.notas.fields.promg')</th>	

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($notas) > 0)
                        @foreach ($notas as $nota)
                            <tr data-entry-id="{{ $nota->id }}">
                                <td></td>

                <td><?php 
                $registros=mysqli_query($conexion,"select * from materias where id='$nota->id_materia'") or
                      die("Problemas en el select:".mysqli_error($conexion));

                    if ($reg=mysqli_fetch_array($registros))
                    {
                      echo $reg['materia'];
                      }

                ?></td>
                <td>{{ $nota->user->name}}</td>
								<td>{{ $nota->q1p1 }}</td>
								<td>{{ $nota->q1p2 }}</td>
								<td>{{ $nota->q1p3 }}</td>
								<td>{{ ((($nota->q1p1 + $nota->q1p2 + $nota->q1p3)/3)*0.8) }}</td>
								<td>{{ $nota->q1exam }}</td>
								<td>{{ ((($nota->q1p1 + $nota->q1p2 + $nota->q1p3)/3)*0.8) + ($nota->q1exam  * 0.2) }}</td>
								<td>{{ $nota->q2p1 }}</td>
								<td>{{ $nota->q2p2 }}</td>
								<td>{{ $nota->q2p3 }}</td>
								<td>{{ ((($nota->q2p1 + $nota->q2p2 + $nota->q2p3)/3)*0.8) }}</td>
								<td>{{ $nota->q2exam }}</td>
								<td>{{ ((($nota->q2p1 + $nota->q2p2 + $nota->q2p3)/3)*0.8) + ($nota->q2exam  * 0.2) }}</td>		

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>			

    </div>
@stop

@section('javascript') 

@endsection
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
function materiaChange() {
   console.log("Prueba");
		var id = $("#id_curso").val();		
		var materia = $("#id_materia").val();
		console.log(id);
          $.ajax({
           url: '/admin/getNotas/'+id+'/materia/'+materia,
           type: 'get',
           dataType: 'json',
           success: function(response){
			
			 console.log(response);
			var data = jQuery.parseJSON(JSON.stringify(response));
			var count = Object.keys(data).length;
		    console.log(response);
			console.log(count);
            var len = 0;
             if(count > 0){
               len = count;
             }
			 var t = $('#DataTables_Table_0').DataTable();
			 t.rows().remove().draw();			 
             if(len > 0){
               // Read data and create <option >
               var id ="";
			   var name ="";

			   for(var i=0; i<len; i++){
					
					var promedio1 = (((data[i].q1p1 + data[i].q1p2 + data[i].q1p3)/3)*0.8);
					var promedio2 = (((data[i].q2p1 + data[i].q2p2 + data[i].q2p3)/3)*0.8);
					var general1 = (((data[i].q1p1 + data[i].q1p2 + data[i].q1p3)/3)*0.8)+(q1exam * 0.2);
					var general2 = (((data[i].q2p1 + data[i].q2p2 + data[i].q2p3)/3)*0.8)+(q2exam * 0.2);
					var text=['',data[i].user.name,data[i].q1p1,data[i].q1p2,data[i].q1p3,promedio1,data[i].q1exam,data[i].q2p1,data[i].q2p2,data[i].q2p3,promedio2,data[i].q2exam,'<a href="@php route(admin.nota.edit, if(count($notas)> 0){echo $nota->id} ) " class="btn btn-xs btn-info">@lang('global.app_edit')</a>'];
					//var row = JSON.parse(text);
					t.row.add(text).draw();
					console.log(promedio1);
			   }
             }
           }
        }); 
}		

</script>