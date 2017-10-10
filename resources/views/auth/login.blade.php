@extends('layouts.app')
@section('style')
    <style>
        body{
            height:100%;
        }
        nav{
            display:none;
        }
        .container{
            padding-top:10%;
            height:100%;
        }
        .container h1{
            margin-bottom:5%;
            font-size:40px;
            color:#0C86AF;
            font-family:  'Helvetica Neue', 'Helvetica', 'Microsoft Yahei', sans-serif;
            font-weight: 800;
        }
        @media (max-width: 710px) {
            .container h1{
                font-size:16px;
                margin-bottom:30px;
            }
        }

        /*.copyright{*/
            /*!*position:absolute;*!*/
            /*!*bottom:30px;*!*/
            /*margin-top:20%;*/
            /*color:#999;*/
        /*}*/
        /*.copyright span{*/
            /*display:inline-block;*/
        /*}*/
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <h1 class="text-center">宁海县物业管理项目数字档案管理系统</h1>
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('auth.login') }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
{{-- 
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ __('auth.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">用户名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{ __('auth.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('auth.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('auth.login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('auth.forget') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
<p class="text-center"><strong>主办单位：</strong>宁海县住房和城乡建设局&nbsp; &nbsp; &nbsp; &nbsp;<strong>技术支持：</strong>宁海县规划设计院</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
      $(function($){
        $('body').height($(window).height()).css({"background":"url({{ asset('img/loginbg.jpg') }}) no-repeat","background-size":"cover"});
      })
    </script>
@endsection