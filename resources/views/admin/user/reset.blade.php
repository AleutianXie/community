@extends('layouts.app')

@section('content')
@if (Auth::user()->hasRole('admin') || $user->id ==Auth::id())
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                        <a href="/list" class="list-group-item">{{ __('archive.sidebar.list') }}</a>
                        <a href="/create" class="list-group-item">{{ __('archive.sidebar.add') }}</a>
                        <a href="/map" class="list-group-item">{{ __('archive.sidebar.map') }}</a>
                        <a href="/admin" class="list-group-item active">{{ __('admin.sidebar.usermanage') }}</a>
                        <a href="/property" class="list-group-item">{{ __('admin.sidebar.propertymanage') }}</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-10">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">{{ __('archive.go') }}</button>
                    </p>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('auth.reset') }}</div>

                        <div class="panel-body">
                            @include('messages')
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            {!! Form::open() !!}
                            <div class="input-group">
                                {!! Form::hidden('id', $user->id) !!}
                                {!! Form::label('name_label', __('auth.name'), ['class' => 'input-group-addon']) !!}
                                {!! Form::label('name_value', $user->name, ['class' => 'form-control']) !!}
                            </div>
                            <br/>
                            <div class="input-group">
                                {!! Form::label('password', __('auth.password'), ['class' => 'input-group-addon']) !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('password')) }}</div>
                            </div>
                            <br/>
                            <div class="input-group">
                                {!! Form::label('confrim', __('auth.confrim'), ['class' => 'input-group-addon']) !!}
                                {!! Form::password('confrim', ['class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('confrim')) }}</div>
                            </div>
                            <br/>
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
</div>
@else
Access Deny!
@endif
@endsection