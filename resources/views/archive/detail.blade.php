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
                        <div class="panel-heading">{{ __('archive.sidebar.list') }} / {{ __('archive.sidebar.detail') }}</div>

                        <div class="panel-body">
                            @include('messages')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-md-push-8">
                                    <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('archive.name') }} </div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="name">{{ $archive->name }}</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('archive.address') }} </div>

                                            <div class="profile-info-value">
                                                <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                <span class="editable editable-click" id="address">{{ $archive->address }}</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('archive.unit') }} </div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="unit">{{ $archive->unit }}</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('archive.building') }} </div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="building">{{ $archive->building }}</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('archive.lift') }} </div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="lift">{{ $archive->lift }}</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('archive.property') }}</div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="property">{{ $archive->property }}</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('archive.principal') }}</div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="principal">{{ $archive->principal }}</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('archive.mobile') }}</div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="mobile">{{ $archive->mobile }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-8 col-md-pull-4">
                                    <div id="jssor_1" style="margin:0 auto;top:0px;left:0px;width:980px;height:580px;overflow:hidden;visibility:hidden;">
                                        <!-- Loading Screen -->
                                        <div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);">
                                            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/double-tail-spin.svg" />
                                        </div>
                                        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:580px;overflow:hidden;">
                                            <div>
                                                <img data-u="image" src="{{ asset('img/011.jpg') }}" />
                                            </div>
                                            <div>
                                                <img data-u="image" src="{{ asset('img/012.jpg') }}" />
                                            </div>
                                            <div>
                                                <img data-u="image" src="{{ asset('img/013.jpg') }}" />
                                            </div>
                                            <div>
                                                <img data-u="image" src="{{ asset('img/014.jpg') }}" />
                                            </div>
                                            <div>
                                                <img data-u="image" src="{{ asset('img/015.jpg') }}" />
                                            </div>
                                            <div>
                                                <img data-u="image" src="{{ asset('img/016.jpg') }}" />
                                            </div>
                                        </div>
                                        <!-- Bullet Navigator -->
                                        <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                                            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                                    <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <!-- Arrow Navigator -->
                                        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                                                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                                            </svg>
                                        </div>
                                        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                                                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                                            </svg>
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
@endsection


@section('scripts')
<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var jssor_1_SlideshowTransitions = [
          {$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$Jease$.$OutQuad},
          {$Duration:500,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Easing:$Jease$.$OutQuad},
          {$Duration:1000,x:-0.2,$Delay:40,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
          {$Duration:2000,y:-1,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$Jease$.$OutJump,$Round:{$Top:1.5}},
          {$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$OutQuad},$Round:{$Left:1.3,$Top:2.5}}
        ];

        var jssor_1_options = {
          $AutoPlay: 1,
          $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
          },
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
          },
          $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$
          }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/
        /*remove responsive code if you don't want the slider scales while window resizing*/
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 980);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        /*#endregion responsive code end*/

        //editables on first profile page
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";

        $('#name').editable({
            type: 'text',
            url: '/edit',
            params: {'_token' : '{{ csrf_token() }}'},
            pk: {{ $archive->id }},
            error: function(response){
                return response.responseJSON.name[0];
            }
        });

        $('#address').editable({
            type: 'text',
            url: '/edit',
            params: {'_token' : '{{ csrf_token() }}'},
            pk: {{ $archive->id }},
            error: function(response){
                return response.responseJSON.address[0];
            }
        });

        $('#unit').editable({
            type: 'text',
            url: '/edit',
            params: {'_token' : '{{ csrf_token() }}'},
            pk: {{ $archive->id }},
            error: function(response){
                return response.responseJSON.unit[0];
            }
        });

        $('#building').editable({
            type: 'text',
            url: '/edit',
            params: {'_token' : '{{ csrf_token() }}'},
            pk: {{ $archive->id }},
            error: function(response){
                return response.responseJSON.building[0];
            }
        });

        $('#lift').editable({
            type: 'text',
            url: '/edit',
            params: {'_token' : '{{ csrf_token() }}'},
            pk: {{ $archive->id }},
            error: function(response){
                return response.responseJSON.lift[0];
            }
        });

        $('#property').editable({
            type: 'text',
            url: '/edit',
            params: {'_token' : '{{ csrf_token() }}'},
            pk: {{ $archive->id }},
            error: function(response){
                return response.responseJSON.property[0];
            }
        });

        $('#principal').editable({
            type: 'text',
            url: '/edit',
            params: {'_token' : '{{ csrf_token() }}'},
            pk: {{ $archive->id }},
            error: function(response){
                return response.responseJSON.principal[0];
            }
        });

        $('#mobile').editable({
            type: 'text',
            url: '/edit',
            params: {'_token' : '{{ csrf_token() }}'},
            pk: {{ $archive->id }},
            error: function(response){
                return response.responseJSON.mobile[0];
            }
        });
    });
</script>
@endsection
