@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.comment.title')</h3>
    
    {!! Form::model($comment, ['method' => 'PUT', 'route' => ['admin.comments.update', $comment->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.comment.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comment', trans('quickadmin.comment.fields.comment').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('comment'))
                        <p class="help-block">
                            {{ $errors->first('comment') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($comment->avatar)
                        <img src="{{ asset(env('UPLOAD_PATH').App\Comment::PATH . $comment->avatar) }}" style="width: 200px;">
                    @endif
                    {!! Form::label('avatar', trans('quickadmin.comment.fields.avatar'), ['class' => 'control-label']) !!}
                    {!! Form::file('avatar', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('avatar'))
                        <p class="help-block">
                            {{ $errors->first('avatar') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <!-- checkbox -->
                <div class="col-xs-12 form-group">
                    <label>
                        {{Form::radio('status', 'active', false,
                            ['class' => 'minimal', 'id' => 'active']
                        )}}
                    </label>
                    <label for="active">
                        Опубликовать
                    </label>
                </div>
            </div>

            <div class="row">
                <!-- checkbox -->
                <div class="col-xs-12 form-group">
                    <label>
                        {{Form::radio('status', 'wait', false,
                            ['class' => 'minimal', 'id' => 'wait']
                        )}}
                    </label>
                    <label for="wait">
                        Запретить
                    </label>
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

