@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.price.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.price.fields.flag')</th>
                            <td field-key='flag'>@if($price->flag)<a href="{{ asset(env('UPLOAD_PATH').'/' . $price->flag) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/img/' . $price->flag) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.price.fields.price')</th>
                            <td field-key='price'>{{ $price->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.price.fields.currency')</th>
                            <td field-key='currency'>{{ $price->currency }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.prices.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


