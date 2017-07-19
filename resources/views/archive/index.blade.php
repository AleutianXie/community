@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
            <a href="/" class="list-group-item active">{{ __('archive.sidebar.list') }}</a>
            <a href="/create" class="list-group-item">{{ __('archive.sidebar.add') }}</a>
            </div>
        </div>

        <div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">前往</button>
            </p>
                <div class="panel panel-default">
                    <div class="panel-heading">档案列表</div>


            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
