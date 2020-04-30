@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.menu-social.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.menu-social.fields.title')</th>
                            <td field-key='title'>{{ $menu_social->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.menu-social.fields.link')</th>
                            <td field-key='link'>{{ $menu_social->link }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.menu_socials.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


