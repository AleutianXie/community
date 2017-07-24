@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                    <a href="/" class="list-group-item active">{{ __('archive.sidebar.list') }}</a>
                    <a href="/create" class="list-group-item">{{ __('archive.sidebar.add') }}</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-10">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">{{ __('archive.go') }}</button>
                    </p>
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ __('archive.sidebar.list') }}</div>

                            <div class="panel-body">
                                @include('messages')

                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>{{ __('archive.name') }}</th>
                                            <th>{{ __('archive.address') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($archives as $archive)
                                        <tr>
                                            <td>{{ $archive->id }}</td>
                                            <td><a href="{{ asset('/'.$archive->id) }}">{{ $archive->name }}</a></td>
                                            <td>{{ $archive->address }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pull-right">
                                {{ $archives->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
