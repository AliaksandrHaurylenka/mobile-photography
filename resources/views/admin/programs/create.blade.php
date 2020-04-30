@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.program.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.programs.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lessons', trans('quickadmin.program.fields.lessons').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('lessons', old('lessons'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lessons'))
                        <p class="help-block">
                            {{ $errors->first('lessons') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

