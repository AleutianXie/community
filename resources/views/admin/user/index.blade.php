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
                        <a href="/admin" class="list-group-item active">{{ __('admin.sidebar.usermanage') }}</a>
                        <a href="/property" class="list-group-item">{{ __('admin.sidebar.propertymanage') }}</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-10">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">{{ __('archive.go') }}</button>
                    </p>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('admin.sidebar.usermanage') }}</div>

                        <div class="panel-body">
                            @include('messages')

                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{ __('auth.name') }}</th>
                                        <th>{{ __('auth.email') }}</th>
                                        <th>{{ __('admin.role.title') }}</th>
                                        <th>{{ __('archive.property') }}</th>
                                        <th>{{ __('admin.operation') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>@foreach ($user->getRoleNames() as $role)
                                            {{ __('admin.role.item.'.$role) }} &nbsp;
                                        @endforeach</td>
                                        <td>@isset ($user->user_property->property->name)
                                            {{ $user->user_property->property->name }}</td>
                                        @endisset</td>
                                        <td><a type="button" class="btn btn-primary" href="/reset/{{ $user->id }}"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;{{ __('admin.reset') }}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Indicates a successful or positive action -->
                            <a type="button" class="btn btn-success" href="/admin/user/create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;{{ __('admin.create') }}</a>
                            <div class="pull-right">
                                {{ $users->links() }}
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