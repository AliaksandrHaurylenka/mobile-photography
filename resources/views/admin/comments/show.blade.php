@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.comment.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.comment.fields.avatar')</th>
                            <td field-key='avatar'>
                                @if($comment->avatar)
                                    <img src="{{ asset(env('UPLOAD_PATH').App\Comment::PATH . $comment->avatar) }}" class="img-responsive" style="width: 300px;">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.comment.fields.name')</th>
                            <td field-key='comment'>{{ $comment->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.comment.fields.comment')</th>
                            <td field-key='currency'>{{ $comment->comment }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.comments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


