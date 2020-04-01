@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.materias.materia')</h3>
    <p>
        <a href="{{ route('admin.materia.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($materias) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('global.materias.materia')</th>
                        <th>@lang('global.materias.fields.curso')</th>
                        <th>@lang('global.materias.fields.docente')</th>
						<th>@lang('global.materias.fields.estado')</th>
						<th>@lang('global.materias.fields.periodo')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($materias) > 0)
                        @foreach ($materias as $materia)
                            <tr data-entry-id="{{ $materia->id }}">
                                <td></td>

                                <td>{{ $materia->materia }}</td>
                                <td>{{ $materia->id_curso }}</td>
								<td>{{ $materia->id_user }}</td>
								<td>{{ $materia->estado }}</td>
								<td>{{ $materia->periodo }}</td>
                                <td>
                                    <a href="{{ route('admin.materia.edit',[$materia->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.materia.destroy', $materia->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
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

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection