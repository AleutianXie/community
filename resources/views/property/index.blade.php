@extends('layouts.app')

@section('content')
@role('admin')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                    <a href="/list" class="list-group-item">{{ __('archive.sidebar.list') }}</a>
                    <a href="/create" class="list-group-item">{{ __('archive.sidebar.add') }}</a>
                    <a href="/map" class="list-group-item">{{ __('archive.sidebar.map') }}</a>
                    <a href="/admin" class="list-group-item">{{ __('admin.sidebar.usermanage') }}</a>
                    <a href="/property" class="list-group-item active">{{ __('admin.sidebar.propertymanage') }}</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-10">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">{{ __('archive.go') }}</button>
                    </p>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('property.sidebar.list') }}</div>

                        <div class="panel-body">
                            @include('messages')

                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{ __('property.name') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($properties as $property)
                                    <tr>
                                        <td>{{ $property->id }}</td>
                                        <td><a href="{{ asset('/property/'.$property->id) }}">{{ $property->name }}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Indicates a successful or positive action -->
                            <a type="button" class="btn btn-success" href="/property/create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;{{ __('admin.create') }}</a>
                            <div class="pull-right">
                                {{ $properties->links() }}
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
@endrole
@endsection
