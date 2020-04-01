@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.notas.nota')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

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
		
		
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>				
                    <tr>
 						<th>Nombre</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr data-entry-id="{{ $user->id }}">
								
                                <td>{{ $user->name}}</td>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
function cursoChange() {
   console.log("Prueba");
		var id = $("#id_curso").val(); 
		
		console.log(id);
          $.ajax({
           url: '/admin/getDocentes/'+id,
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
			 var t = $('#DataTables_Table_0').DataTable();
			 t.rows().remove().draw();			 			 
             if(len > 0){
               // Read data and create <option >
               var id ="";
			   var name ="";
			   for(var i=0; i<len; i++){

               var id ="";
			   var name ="";
			   for(var i=0; i<len; i++){
					
					var text=[data[i].name];
					t.row.add(text).draw();
			   
				}
			}
        }
	}	
		   
    }); 
 		
}
		

</script>