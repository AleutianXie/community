@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                    <a href="/list" class="list-group-item active">{{ __('archive.sidebar.list') }}</a>
                    <a href="/create" class="list-group-item">{{ __('archive.sidebar.add') }}</a>
                    <a href="/map" class="list-group-item">{{ __('archive.sidebar.map') }}</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-10">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">{{ __('archive.go') }}</button>
                    </p>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('archive.attach') }} / {{ $archive->name }}  </div>

                        <div class="panel-body">
                            @include('messages')

                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-sm-10">{{ __('archive.attachname') }}</th>
                                        <th>{{ __('admin.operation') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($attachs as $attach)
                                    <tr>
                                        <td>{{ $attach->name }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('attach.download', $attach->id) }}" class="btn btn-success" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-download" aria-hidden="true"></span> {{ __('archive.download') }} </a>
                                                <a  href="#" data-toggle="modal" data-target="#modal-delete-{{ $attach->id }}" class="btn btn-danger" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {{ __('archive.delete') }} </a>
                                            </div>
                                            {{-- 确认删除 --}}
                                            <div class="modal fade" id="modal-delete-{{ $attach->id }}" tabIndex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                            ×
                                                            </button>
                                                            <h4 class="modal-title">确认删除</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="lead">
                                                                <i class="fa fa-question-circle fa-lg"></i>
                                                                确认删除该附件？
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form  method="POST" action="{{ route('attach.delete', $attach->id) }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="id" value="{{ $attach->id }}">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">否</button>
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="fa fa-times-circle"></i> 是
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pull-right">
                                {{ $attachs->links() }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('archive.uploadattach') }}</label>
                            <div class="file-loading">
                                <input id="file-attach" name="file-attach[]" type="file" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('#file-attach').fileinput({
        theme: 'fa',
        language: 'zh',
        fileActionSettings: {
            showUpload: false,
            showRemove: false,
        },
        minFileCount: 1,
        uploadAsync: false,
        uploadUrl: '/attach/create',
        uploadExtraData: {
            _token: '{{ csrf_token() }}',
            id: '{{ $archive->id }}',
        },
        showClose: false,
        allowedFileExtensions: ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'zip', '7z', 'rar', 'jpg', 'jpeg', 'png', 'gif', 'bmp']
    });

    $('#file-attach').on('filebatchuploadsuccess', function() {
        location.reload() 
    });
</script>
@endsection