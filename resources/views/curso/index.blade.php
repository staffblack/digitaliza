@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cursos.curso')</h3>
    <p>
        <a href="{{ route('admin.curso.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($cursos) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('global.cursos.curso')</th>
                        <th>@lang('global.cursos.fields.paralelo')</th>
                        <th>@lang('global.cursos.fields.periodo')</th>
						<th>@lang('global.cursos.fields.cupo')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($cursos) > 0)
                        @foreach ($cursos as $curso)
                            <tr data-entry-id="{{ $curso->id }}">
                                <td></td>

                                <td>{{ $curso->curso }}</td>
                                <td>{{ $curso->paralelo }}</td>
								<td>{{ $curso->periodo }}</td>
								<td>{{ $curso->cupo }}</td>
                                <td>
                                    <a href="{{ route('admin.curso.edit',[$curso->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.curso.destroy', $curso->id])) !!}
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