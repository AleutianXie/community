@extends('layouts.app')

@section('style')
    <style>
        body{
            margin:0;
            padding:0;
            width:100%;
            height:100%;
            overflow: hidden;
        }
        #module{
            position:absolute;
            top:0;
            left:0;
            background:rgba(0,0,0,0.25);
            display: none;
            z-index: 10;
        }
        .module_close{
            width: 30px;
            height: 30px;
            display: block;
            position: absolute;
            top: 70px;
            right: 30px;
            background: url({{ asset('js/nh/images/close_def.png') }})  no-repeat;
            background-size:cover;
            cursor: pointer;
        }
        .module_close:hover{
            background:url({{ asset('js/nh/images/close_hov.png') }}) no-repeat;
            background-size:cover;
        }
        #canvas{
            margin:0;
            padding:0;
        }
        input[type=range]{
            /*position:absolute;*/
            /*width:20%;*/
            /*bottom:5%;*/
            /*left:1%;*/
            display: none;
            opacity:0;
        }
    </style>
@endsection

@section('content')

    <div id="module">
        <a class="module_close" href="javascript:hideModule();"></a>
        <canvas id="canvas"></canvas>
    </div>
    <input type="range" id="scale-range" min="0.2" max="2" step="0.05" value="1">
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
                        <div class="panel-heading">{{ __('archive.sidebar.list') }} / {{ __('archive.sidebar.detail') }}</div>

                        <div class="panel-body">
                            @include('messages')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
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
                                            <div class="profile-info-name"> {{ __('archive.shape_area') }} </div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="shape_area">{{ $archive->shape_area }}</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> {{ __('archive.property') }}</div>

                                            <div class="profile-info-value">
                                                <span class="editable editable-click" id="property">{{ $archive->property ->name }}</span>
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
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href='{{ '/map/'.$archive->id }}' target="_blank">查看小区分布</a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <div id="jssor_1" style="margin:0 auto;top:0px;left:0px;width:980px;height:580px;overflow:hidden;visibility:hidden;">
                                        <!-- Loading Screen -->
                                        <div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);">
                                            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{ asset('img/double-tail-spin.svg') }}" />
                                        </div>
                                        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:580px;overflow:hidden;">
                                        @foreach ($archive->photos as $photo)
                                            <div>
                                                <img data-u="image" src="{{ $photo->path }}" >
                                            </div>


                                        @endforeach


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
                            <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        {{ __('archive.update.geometry') }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <button id="Polygon" data-dojo-type="dijit/form/Button">绘制</button>
                                    <button id="clear" data-dojo-type="dijit/form/Button">清除</button>
                                    <div id="mapDiv" style="width:100%; height:500px; solid #000;"></div>
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

        $('#shape_area').editable({
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

<script type="text/javascript">
    dojoConfig = {
        parseOnLoad: true,
        packages: [
        {
            name: 'tdlib',
            location: "{{ asset('js/nh/tdlib') }}"
        },
        {
          name:'extras',
          location: "{{ asset('js/nh/extras') }}"
        }
        ]
    };
</script>
<link rel="stylesheet" href="{{ asset('js/nh/arcgis_js_api/library/3.21compact/dijit/themes/claro/claro.css') }}">
<link rel="stylesheet" href="{{ asset('js/nh/arcgis_js_api/library/3.21compact/esri/css/esri.css') }}">
<script src="{{ asset('js/nh/arcgis_js_api/library/3.21compact/init.js') }}"></script>
<script type="text/javascript">
var map,tb;
//图片放大功能

$("img[data-u=image]").on('click',function(e) {
  src = $(this).prop("src");
  showModule();
})
  var canvas = document.getElementById("canvas");
  var context = canvas.getContext("2d");
  var slider = document.getElementById("scale-range");
  var scale = slider.value;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  scale = slider.value;
  var w = $(window).width();
  var h = $(window).height();
  var dw = 0;
  var dh = 0;
  var imageWidth = 0;
  var imageHeight = 0;
  canvas.width = w;
  canvas.height = h;
  var image = new Image();
  var src="";
  function showModule(){
    image.src = src;
    imageWidth = image.width*scale;
    imageHeight = image.height*scale;
    dw = w/2-imageWidth/2;
    dh = h/2-imageHeight/2;
    $("#module").height(h).width(w);
    $("#module").css({display:"block"});
    $("input[type=range]").css({display:"block"});
    image.onload = function(){
//    drawImageByScale();
//    slider.onmousemove = function(){
//      drawImageByScale();
//    };
      context.drawImage(image,dw,dh,imageWidth,imageHeight);
      move();
    };

    addEvent(canvas,'mousewheel',onMouseWheel);
    addEvent(canvas,'DOMMouseScroll',onMouseWheel);
    // 当滚轮事件发生时，执行onMouseWheel这个函数
    function onMouseWheel(e) {
      e = e || window.event;
      if(e.wheelDelta){
        console.log(e.wheelDelta);
        if(e.wheelDelta>0){
          slider.value +=0.05;
          drawImageByScale();
        }else{
          slider.value -= 0.05;
          drawImageByScale();
        }
      }else if(e.detail){
        if(e.detail>0){
          slider.value +=0.05;
          drawImageByScale();
        }else{
          slider.value -=0.05;
          drawImageByScale();
        }
      }
    }
  }

  function addEvent(obj,xEvent,fn){
    if(obj.attachEvent){
      obj.attachEvent('on'+xEvent,fn);
    }else{
      obj.addEventListener(xEvent,fn,false);
    }
  }

  function drawImageByScale(){
    var oldScale = scale;
    scale = slider.value;
    imageWidth = image.width*scale;
    imageHeight = image.height*scale;
    dw = dw+image.width*(oldScale-scale)/2;
    dh = dh+image.height*(oldScale-scale)/2;
    context.clearRect(0,0,w,h);
    context.drawImage(image,dw,dh,imageWidth,imageHeight);
  }

  function hideModule(){
    $("#module").css({display:"none"});
  }
  function move(){
    var canMove = false;
    var startX = 0;
    var startY = 0;
    canvas.onmousedown = function(e){
      e = e || window.event;
      this.style.cursor = "move";
      startX = e.offsetX;
      startY = e.offsetY;
      canMove = true;
      startMove();
    }
    canvas.onmouseup = function(){
      this.style.cursor = "default";
      canMove = false;
      dw += cx-startX;
      dh += cy-startY;
    }
    function startMove(){
      canvas.onmousemove = function(e) {
        e = e || window.event;
        cx = e.clientX;
        cy = e.clientY;
        setInterval(function(){
          if(canMove){
            context.clearRect(0,0,w,h);
            context.drawImage(image,dw+cx-startX,dh+cy-startY,imageWidth,imageHeight);
          }
        },50)
      }
    }
  }


/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/

require(
  ["esri/map","esri/dijit/Popup","esri/dijit/PopupTemplate","esri/toolbars/draw","esri/symbols/SimpleMarkerSymbol","esri/symbols/SimpleLineSymbol", "esri/symbols/SimpleFillSymbol","esri/renderers/ClassBreaksRenderer","tdlib/ClusterLayer","esri/geometry/webMercatorUtils", "esri/graphic","esri/Color","esri/layers/GraphicsLayer", "esri/SpatialReference","tdlib/TDTLayer","tdlib/TDTAnnoLayer","esri/geometry/Point","dojo/parser","dijit/registry","dijit/form/Button", "dojo/domReady!"],
  function(Map,Popup, PopupTemplate,Draw,SimpleMarkerSymbol, SimpleLineSymbol, SimpleFillSymbol, ClassBreaksRenderer,ClusterLayer,webMercatorUtils,Graphic,Color,GraphicsLayer,SpatialReference,TDTLayer,TDTAnnoLayer,Point,parser,registry,Button)
  {
    parser.parse();
    var popupOptions = {
        titleInBody: false,
        highlight: true,
        marginTop: 60,
        width: 100
    };
    var popup = new esri.dijit.Popup(popupOptions, dojo.create("div"));
    map=new Map("mapDiv",{ logo:false,infoWindow: popup});
    map.on('load', function() {
        @if (!empty($archive->geometry))
            requestData();
        @endif
    });
    var nhbasemap = new TDTLayer();
    map.addLayer(nhbasemap);
    var nhannolayer=  new TDTAnnoLayer();
    map.addLayer(nhannolayer);

    map.centerAndZoom(new Point({"x": 121.42018376109351, "y": 29.291107035766274, "spatialReference": {"wkid": 4490 } }),11);
    var graLayer = new GraphicsLayer({id:"xiaoqu"});
    map.addLayer(graLayer);

    function requestData(){
      dojo.addOnLoad(function(resp){
        @if (!empty($archive->geometry))
        var geo = $.parseJSON('{!! $archive->geometry !!}');

        var polygon = new esri.geometry.Polygon(new SpatialReference({wkid:4490}));
        polygon.rings = geo.rings;
        @endif

        @if (!empty($id) && $archive->id == $id)
        var symbol = new SimpleFillSymbol(
          SimpleFillSymbol.STYLE_SOLID,
          new SimpleLineSymbol(
            SimpleLineSymbol.STYLE_DASHDOT,
              new Color([255,0,0]),
              2
            ),
            new Color([255,255,0,0.25])
        );
        @else
          var symbol = new SimpleFillSymbol(
            SimpleFillSymbol.STYLE_SOLID,
            new SimpleLineSymbol(
              SimpleLineSymbol.STYLE_SOLID,
                new Color([255,25,0]),
                0.5
              ),
              new Color([0,255,0,0.25]));
        @endif

        var popupTemplate = esri.dijit.PopupTemplate({
          title: "{{ $archive->name }}",
          fieldInfos: [
            {
              fieldName: "address",
              label: "{{ __('archive.address') }}",
              visible: true
            },
            {
              fieldName: "unit",
              label: "{{ __('archive.unit') }}",
              visible: true
            },
            {
              fieldName: "building",
              label: "{{ __('archive.building') }}",
              visible: true
            },
            {
              fieldName: "lift",
              label: "{{ __('archive.lift') }}",
              visible: true
            },
            {
              fieldName: "property",
              label: "{{ __('archive.property') }}",
              visible: true
            },
            {
              fieldName: "principal",
              label: "{{ __('archive.principal') }}",
              visible: true
            },
            {
              fieldName: "mobile",
              label: "{{ __('archive.mobile') }}",
              visible: true
            },
            {
              fieldName: "link",
              label: "更多",
              visible: true
            }
          ]
        });

        var attributes = new Array();
        attributes["address"]="{{ $archive->address }}";
        attributes["unit"]="{{ $archive->unit }}";
        attributes["building"]="{{ $archive->building }}";
        attributes["lift"]="{{ $archive->lift }}";
        attributes["property"]="{{ $archive->property }}";
        attributes["principal"]="{{ $archive->principal }}";
        attributes["mobile"]="{{ $archive->mobile }}";

        attributes["link"]="{{ url('/'.$archive->id) }}";
        var graphic = new Graphic(polygon, symbol, attributes, popupTemplate);
        graLayer.add(graphic);

        @if (!empty($id) && $archive->id == $id)
          map.centerAndZoom(graphic.geometry.getCentroid(),15);
          var symbol = new esri.symbol.PictureMarkerSymbol("{{ asset('js/nh/images/grn_pushpin_48px.png') }}", 48, 48);
          ptgraphic = new esri.Graphic(graphic.geometry.getCentroid(),symbol, attributes, popupTemplate);
          graLayer.add(ptgraphic);
        @endif
      });
    }

            registry.byId("clear").on("click", function() {
                //清除所有绘制的面数据
            map.graphics.clear();
            //清除graphiclayer图层的数据
            map.getLayer("xiaoqu").clear();

        });

                    tb = new Draw(map);
        tb.on("draw-end", addGraphic);
            registry.byId("Polygon").on("click", function() {
            tb.activate(this.id.toLowerCase());
        });


    function addGraphic(evt){
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
            //alert(evt.geometry.type);
             tb.deactivate();
         //map.enableMapNavigation();
         var symbol = new SimpleFillSymbol(
          SimpleFillSymbol.STYLE_SOLID,
          new SimpleLineSymbol(
            SimpleLineSymbol.STYLE_SOLID,
            new Color([r,g,b,0.9]),
            4
          ),new Color([r,g,b,0.5]));
                    map.graphics.add(new Graphic(evt.geometry, symbol));
                    $('#geometry').val($.toJSON(evt.geometry));
                    console.log($.toJSON(evt.geometry));
                    //evt.geometry.rings[0] 坐标串
                    //evt.geometry.spatialReference.wkid 参考系
                    //evt.geometry.type  图形类型
                    //
                    //https://developers.arcgis.com/javascript/3/jssamples/toolbar_draw.html
    }
  });
</script>
@endsection
