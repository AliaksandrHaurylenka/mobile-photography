@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.portfolio.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.portfolios.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo', trans('quickadmin.portfolio.fields.photo').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('photo', old('photo')) !!}
                    {!! Form::file('photo', ['class' => 'form-control', 'required' => '']) !!}
                    {!! Form::hidden('photo_max_size', 2) !!}
                    <p class="help-block"></p>
                    @if($errors->has('photo'))
                        <p class="help-block">
                            {{ $errors->first('photo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="radio">
                        <label>
                            {!! Form::radio('before_after', 'До', false, ['required' => '']) !!}
                            Фото До
                        </label>                        
                    </div>
                    <div class="radio">
                        <label>
                        {!! Form::radio('before_after', 'После', false, ['required' => '']) !!}
                            Фото После
                        </label>                        
                    </div>
                    
                    <p class="help-block"></p>
                    @if($errors->has('before_after'))
                        <p class="help-block">
                            {{ $errors->first('before_after') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('category_id', trans('quickadmin.portfolio.fields.category').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

