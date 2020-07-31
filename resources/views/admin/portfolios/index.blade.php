@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.portfolio.title')</h3>
    @can('portfolio_create')
    <p>
        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

    </p>
    @endcan

    @can('portfolio_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.portfolios.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.portfolios.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($portfolios) > 0 ? 'datatable' : '' }} @can('portfolio_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('portfolio_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.portfolio.fields.id')</th>
                        <th>@lang('quickadmin.portfolio.fields.photo')</th>
                        <th>@lang('quickadmin.portfolio.fields.photo_after')</th>
                        <th>@lang('quickadmin.portfolio.fields.category')</th>
                        @if( request('show_deleted') == 1 )
                            <th>&nbsp;</th>
                        @else
                            <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @if (count($portfolios) > 0)
                        @foreach ($portfolios as $portfolio)
                            <tr data-entry-id="{{ $portfolio->id }}">
                                @can('portfolio_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='id' align="center">
                                    @if($portfolio->id)
                                        {{ $portfolio->id }}
                                    @endif
                                </td>

                                <td field-key='photo' align="center">
                                    @if($portfolio->photo)
                                        <a href="{{ asset(env('UPLOAD_PATH'). App\Portfolio::PATH . $portfolio->photo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH'). App\Portfolio::PATH . $portfolio->photo) }}" class="img-responsive" style="width: 300px;">
                                        </a>
                                    @endif
                                </td>

                                <td field-key='photo_after' align="center">
                                    @if($portfolio->photo_after)
                                        <a href="{{ asset(env('UPLOAD_PATH'). App\Portfolio::PATH . $portfolio->photo_after) }}" target="_blank">
                                            <img src="{{ asset(env('UPLOAD_PATH'). App\Portfolio::PATH . $portfolio->photo_after) }}" class="img-responsive" style="width: 300px;">
                                        </a>
                                    @endif
                                </td>

                                <td field-key='category'>{{ $portfolio->category->title ?? '' }}</td>

                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('portfolio_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.portfolios.restore', $portfolio->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('portfolio_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.portfolios.perma_del', $portfolio->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('portfolio_view')
                                    <a href="{{ route('admin.portfolios.show',[$portfolio->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('portfolio_edit')
                                    <a href="{{ route('admin.portfolios.edit',[$portfolio->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('portfolio_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.portfolios.destroy', $portfolio->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('portfolio_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.portfolios.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
