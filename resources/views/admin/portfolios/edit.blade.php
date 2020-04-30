@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.portfolio.title')</h3>
    
    {!! Form::model($portfolio, ['method' => 'PUT', 'route' => ['admin.portfolios.update', $portfolio->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo', trans('quickadmin.portfolio.fields.photo').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('photo', old('photo')) !!}
                    @if ($portfolio->photo)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $portfolio->photo) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('photo', ['class' => 'form-control']) !!}
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

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

