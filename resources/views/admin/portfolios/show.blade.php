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
                            <th>@lang('quickadmin.portfolio.fields.category')</th>
                            <td field-key='category'>{{ $portfolio->category->title ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 form-group text-center">
                    @if ($portfolio->photo)
                        <h2>@lang('quickadmin.portfolio.fields.photo')</h2>
                        <img src="{{ asset(env('UPLOAD_PATH') . App\Portfolio::PATH . $portfolio->photo) }}" class="img-responsive">
                    @endif
                </div>

                <div class="col-sm-6 form-group text-center">
                    @if ($portfolio->photo_after)
                        <h2>@lang('quickadmin.portfolio.fields.photo_after')</h2>
                        <img src="{{ asset(env('UPLOAD_PATH') . App\Portfolio::PATH . $portfolio->photo_after) }}" class="img-responsive">
                    @endif
                </div>
            </div>
    </div>
@stop


