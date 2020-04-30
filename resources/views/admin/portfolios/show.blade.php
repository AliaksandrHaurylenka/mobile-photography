@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.portfolio.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.portfolio.fields.photo')</th>
                            <td field-key='photo'>@if($portfolio->photo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $portfolio->photo) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.portfolio.fields.category')</th>
                            <td field-key='category'>{{ $portfolio->category->title ?? '' }}</td>
<td field-key='link'>{{ isset($portfolio->category) ? $portfolio->category->link : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


