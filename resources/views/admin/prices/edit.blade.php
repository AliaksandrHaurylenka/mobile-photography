@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.price.title')</h3>
    
    {!! Form::model($price, ['method' => 'PUT', 'route' => ['admin.prices.update', $price->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($price->flag)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$price->flag) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$price->flag) }}"></a>
                    @endif
                    {!! Form::label('flag', trans('quickadmin.price.fields.flag').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('flag', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('flag_max_size', 2) !!}
                    {!! Form::hidden('flag_max_width', 64) !!}
                    {!! Form::hidden('flag_max_height', 64) !!}
                    <p class="help-block"></p>
                    @if($errors->has('flag'))
                        <p class="help-block">
                            {{ $errors->first('flag') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', trans('quickadmin.price.fields.price').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('price', old('price'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('currency', trans('quickadmin.price.fields.currency').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('currency', old('currency'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('currency'))
                        <p class="help-block">
                            {{ $errors->first('currency') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

