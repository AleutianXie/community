@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
            <a href="/" class="list-group-item">{{ __('archive.sidebar.list') }}</a>
            <a href="/create" class="list-group-item active">{{ __('archive.sidebar.add') }}</a>
            </div>
        </div>

        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">前往</button>
            </p>
                <div class="panel panel-default">
                    <div class="panel-heading">新建档案</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'foo/bar']) !!}
                        <div class="input-group">
                            {!! Form::label('name', __('archive.name'), ['class' => 'input-group-addon']) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                            <div class="red">{{ __($errors->first('name')) }}</div>
                        </div>
                        <br/>
                        <div class="input-group">
                            {!! Form::label('address', __('archive.address'), ['class' => 'input-group-addon']) !!}
                            {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                        </div>

{{--                     {!! Form::label('shape', __('archive.shape')) !!}
                        {!! Form::select('shape', ['1' => '面', '2' => '点']); !!} --}}
                        <br/>
                        <div class="input-group">


                        {!! Form::label('unit', __('archive.unit')) !!}
                        {!! Form::number('unit', null, ['min' => 1, 'max' => 9999]) !!}
                        {!! Form::label('building', __('archive.building')) !!}
                        {!! Form::number('building', null, ['min' => 1, 'max' => 9999]) !!}
                        {!! Form::label('lift', __('archive.lift')) !!}
                        {!! Form::number('lift', null, ['min' => 1, 'max' => 999]) !!}

                                                </div>
                        <br/>
                        <div class="input-group">
                        {!! Form::label('property', __('archive.property')) !!}
                        {!! Form::text('property') !!}
                        </div>
                        <br/>
                        <div class="input-group">
                        {!! Form::label('principal', __('archive.principal')) !!}
                        {!! Form::text('principal') !!}
                        {!! Form::label('mobile', __('archive.mobile')) !!}
                        {!! Form::text('mobile') !!}
                        </div>
{{--                         {!! Form::label('shape_length', __('archive.shape_length')) !!}
                        {!! Form::number('shape_length', null, ['min' => 0.000001, 'step' => '0.000001', 'max' => 99999999999999.999999]) !!}
                        {!! Form::label('shape_area', __('archive.shape_area')) !!}
                        {!! Form::number('shape_area', null, ['min' => 0.000001, 'step' => '0.000001', 'max' => 99999999999999.999999]) !!}
 --}}
                        <hr/>
                        {!! Form::submit(__('archive.submit')) !!}
                        {!! Form::reset(__('archive.reset')) !!}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
