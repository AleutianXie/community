@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                    <a href="/" class="list-group-item">{{ __('property.sidebar.list') }}</a>
                    <a href="/create" class="list-group-item active">{{ __('archive.sidebar.add') }}</a>
                    <a href="/map" class="list-group-item">{{ __('archive.sidebar.map') }}</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-10">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">{{ __('archive.go') }}</button>
                    </p>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('archive.sidebar.add') }}</div>

                        <div class="panel-body">
                            @include('messages')
                            {!! Form::open() !!}
                            <div class="input-group">
                                {!! Form::label('name', __('archive.property.name'), ['class' => 'input-group-addon']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('name')) }}</div>
                            </div>
                            <hr/>
                            <div class="text-center">
                                {!! Form::submit(__('archive.submit'), ['class' => 'btn btn-primary']) !!}
                                {!! Form::reset(__('archive.reset'), ['class' => 'btn btn-default']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
