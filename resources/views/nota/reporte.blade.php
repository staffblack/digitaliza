@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Reporte de Notas</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">

            <table class="table table-bordered table-striped dt-select">
                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>P1</th>
						<th>P2</th>
						<th>P3</th>
						<th>%Prom</th>
						<th>Examen</th>
						<th>%Exa</th>
						<th>Quim1</th>
                        <th>P1</th>
						<th>P2</th>
						<th>P3</th>
						<th>%Prom</th>
						<th>Examen</th>
						<th>%Exa</th>
						<th>Quim2</th>
						<th>Total</th>	
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                            <tr>
								<td>Julio Casagallo</td>
                                <td>10.00</td>
                                <td>8.00</td>
								<td>8.00</td>
								<td>6.92</td>
                                <td>10.00</td>
                                <td>2.00</td>
								<td>8.92</td>
                                <td>0.00</td>
                                <td>0.00</td>
								<td>0.00</td>
								<td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
								<td>0.00</td>
								<td>0.00</td>
                            </tr>
                </tbody>
            </table>		
		
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection