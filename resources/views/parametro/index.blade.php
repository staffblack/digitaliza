@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.notas.nota')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>
				
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($parametros) > 0 ? 'datatable' : '' }} dt-select">
                <thead>				
                    <tr>
						<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
 						<th>Nombre</th>
						<th>Desde</th>
						<th>Hasta</th>
						<th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($parametros) > 0)
                        @foreach ($parametros as $parametro)
                            <tr data-entry-id="{{ $parametro->id }}">
								<td></td>
                                <td>{{ $parametro->descripcion}}</td>
								<td>{{ $parametro->desde}}</td>
								<td>{{ $parametro->hasta}}</td>
                                <td>
                                    <a href="{{ route('admin.parametro.edit',[$parametro->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                </td>								
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
function cursoChangeEs() {
   console.log("Prueba");
		var id = $("#id_curso").val(); 
		
		console.log(id);
        $.ajax({
           url: '/admin/getEstudiantes/'+id,
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