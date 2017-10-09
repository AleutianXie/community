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
                        <div class="panel-heading">{{ __('property.sidebar.list') }} / {{ __('property.sidebar.detail') }}</div>

                        <div class="panel-body">
                            @include('messages')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('property.name') }} </div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="name">{{ $property->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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


@section('scripts')
@role('admin')
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        //editables on first profile page
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";

        $('#name').editable({
            type: 'text',
            url: '/property/edit',
            params: {'_token' : '{{ csrf_token() }}'},
            pk: {{ $property->id }},
            error: function(response){
                return response.responseJSON.name[0];
            }
        });
    });
</script>
@endrole
@endsection
