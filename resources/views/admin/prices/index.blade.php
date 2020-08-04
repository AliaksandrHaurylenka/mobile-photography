@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.price.title')</h3>
    @can('price_create')
        <p>
            <a href="{{ route('admin.prices.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

        </p>
    @endcan

    @can('price_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.prices.index') }}"
                   style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a>
            </li>
            |
            <li><a href="{{ route('admin.prices.index') }}?show_deleted=1"
                   style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a>
            </li>
        </ul>
        </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table
                class="table table-bordered table-striped {{ count($prices) > 0 ? 'datatable' : '' }} @can('price_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('price_delete')
                        @if ( request('show_deleted') != 1 )
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>
                        @endif
                    @endcan

                    <th>@lang('quickadmin.price.fields.flag')</th>
                    <th>@lang('quickadmin.price.fields.price')</th>
                    <th>@lang('quickadmin.price.fields.currency')</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($prices) > 0)
                    @foreach ($prices as $price)
                        <tr data-entry-id="{{ $price->id }}">
                            @can('price_delete')
                                @if ( request('show_deleted') != 1 )
                                    <td></td>
                                @endif
                            @endcan

                            <td field-key='flag'>@if($price->flag)<a
                                    href="{{ asset(env('UPLOAD_PATH').App\Price::PATH . $price->flag) }}"
                                    target="_blank"><img
                                        src="{{ asset(env('UPLOAD_PATH'). App\Price::PATH . $price->flag) }}"
                                        class="img-responsive"/></a>@endif</td>
                            <td field-key='price'>{{ $price->price }}</td>
                            <td field-key='currency'>{{ $price->currency }}</td>
                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('price_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'POST',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.prices.restore', $price->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('price_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.prices.perma_del', $price->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                    @can('price_view')
                                        <a href="{{ route('admin.prices.show',[$price->id]) }}"
                                           class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('price_edit')
                                        <a href="{{ route('admin.prices.edit',[$price->id]) }}"
                                           class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('price_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.prices.destroy', $price->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('price_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.prices.mass_destroy') }}'; @endif
        @endcan
    </script>
@endsection
