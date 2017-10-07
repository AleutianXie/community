{{-- 成功提示 --}}
@if (Session::has('succeed'))
<div class="alert alert-block alert-success">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    {{ Session::get('succeed') }}
</div>
@endif
{{-- 失败提示 --}}
@if (Session::has('error'))
<div class="alert alert-block alert-danger">
    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    {{ Session::get('error') }}
</div>
@endif