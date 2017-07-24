{{-- 成功提示 --}}
@if (Session::has('success'))
<div class="alert alert-block alert-success">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    {{ Session::get('success') }}
</div>
@endif
{{-- 失败提示 --}}
@if (Session::has('error'))
<div class="alert alert-block alert-danger">
    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    {{ Session::get('error') }}
</div>
@endif