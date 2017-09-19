@extends('layouts.app')

@section('style')
  <style>
    #mapDiv{
      position:relative;
    }
    .navbar{
      margin-bottom:0;
    }
    .mapController{
      background-color: transparent;
      position:absolute;
      left:60px;
      top:10px;
      z-index: 10;
    }
    .search{
      right:500px;
    }
      #result{
          background-color: #00a3ef;
          color:#000;
          text-align: center;
          border-radius: 10px;
      }
    #list{
      position:absolute;
      z-index: 10;
      top:100px;
      left:100px;
      width:200px;
    }
  </style>
@endsection
@section('content')

<div id="mapDiv" style="width:100%; height:100%; margin: 0;  padding: 0;">
    <div class="mapController">
        <button id="baselayer">电子地图</button>
        <button id="yxlayer">影像地图</button>
        <button id="polygon">面积测算</button>
        <button id="line">距离测算</button>
        <button id="infoclose">清除</button>
        <input type="text" placeholder="搜索" class="search">
    </div>

    <div id="measure">
        <div id="result"></div>
    </div>
</div>
<div class="container" id="list">
  {{--<div class="row">--}}
    <div class="sidebar-offcanvas" id="sidebar">
      <div class="list-group">
        <a class="list-group-item active">{{ __('archive.sidebar.list') }}</a>
      </div>
    {{--</div>--}}
  </div>
</div>

@endsection

@section('scripts')
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
function setMapZize(){
  var h = window.innerHeight-51;
  $("#mapDiv").height(h);
}
setMapZize();
window.onresize = function(){
  setMapZize();
};

require(
  ["dojo/dom","dojo/on","esri/tasks/LengthsParameters","esri/tasks/AreasAndLengthsParameters","esri/toolbars/draw", "esri/graphic","dojo/keys","esri/config","esri/sniff","esri/SnappingManager","esri/dijit/Measurement","esri/layers/FeatureLayer","esri/renderers/SimpleRenderer","esri/tasks/GeometryService","esri/map","esri/dijit/Popup","esri/dijit/PopupTemplate","esri/toolbars/draw","esri/symbols/SimpleMarkerSymbol","esri/symbols/SimpleLineSymbol", "esri/symbols/SimpleFillSymbol","esri/renderers/ClassBreaksRenderer","tdlib/ClusterLayer","esri/geometry/webMercatorUtils", "esri/graphic","esri/Color","esri/layers/GraphicsLayer", "esri/SpatialReference","tdlib/TDTLayer","tdlib/TDTAnnoLayer","tdlib/TDTYXLayer","esri/geometry/Point","dojo/parser","dijit/registry","dijit/form/Button", "dojo/domReady!"],
  function(dom,on,LengthsParameters,AreasAndLengthsParameters,draw,graphic,keys,esriConfig,has,SnappingManager,Measurement,FeatureLayer,SimpleRenderer,GeometryService,Map,Popup, PopupTemplate,Draw,SimpleMarkerSymbol, SimpleLineSymbol, SimpleFillSymbol, ClassBreaksRenderer,ClusterLayer,webMercatorUtils,Graphic,Color,GraphicsLayer,SpatialReference,TDTLayer,TDTAnnoLayer,TDTYXLayer,Point,parser,registry,Button)
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
        requestData();
    });
    var nhyxmap = new TDTYXLayer();
    map.addLayer(nhyxmap);
    nhyxmap.setVisibility(false);
    var nhbasemap = new TDTLayer();
    map.addLayer(nhbasemap);
    var nhannolayer=  new TDTAnnoLayer();
    map.addLayer(nhannolayer);
    $("#baselayer").click(function(){
        nhbasemap.setVisibility(true);
        nhyxmap.setVisibility(false);
    });
    $("#yxlayer").click(function(){
        nhbasemap.setVisibility(false);
        nhyxmap.setVisibility(true);
    });
    map.centerAndZoom(new Point({"x": 121.42018376109351, "y": 29.291107035766274, "spatialReference": {"wkid": 4490 } }),11);
    var graLayer = new GraphicsLayer({id:"xiaoqu"});
    map.addLayer(graLayer);

    //量距
    esriConfig.defaults.io.proxyUrl = "/proxy/";
    esriConfig.defaults.io.alwaysUseProxy = false;

    var gsvc = new GeometryService("https://utility.arcgisonline.com/ArcGIS/rest/services/Geometry/GeometryServer");
    var measureToolbar = new esri.toolbars.Draw(map);
    var lineSymbol = new SimpleLineSymbol(SimpleLineSymbol.STYLE_SOLID, new Color([0, 0, 0]), 2);
    var polygonSymbol = new SimpleFillSymbol(SimpleFillSymbol.STYLE_SOLID, polygonSymbol, new Color([0, 0, 0, 0.25]));
    on(dom.byId("line"),"click",function(){

      map.graphics.clear();
      $("#result").html("");
      //激活画线工具
      measureToolbar.activate(Draw.POLYLINE, {
        showTooltips:true
      })
    });
    on(dom.byId("polygon"),"click",function(){
      map.graphics.clear();
      $("#result").html("");
      //激活画面工具
      measureToolbar.activate(Draw.POLYGON,{
        showTooltips:true
      })
    });
    measureToolbar.on("draw-end",showMeasureResults);
    var showPt=null;

    function showMeasureResults(evt){
//      measureToolbar.deactivate(); 每次画完线或面后是否关闭绘画工具
      map.graphics.clear();
      map.setMapCursor("default");
      var geometry = evt.geometry;
      switch (geometry.type) {
        case "polyline":{
          var length = geometry.paths[0].length;
          showPt = new Point(geometry.paths[0][length-1],map.spatialReference);
          var lengthParams = new LengthsParameters();
          lengthParams.lengthUnit = esri.tasks.GeometryService.UNIT_KILOMETER;
          lengthParams.polylines = [geometry];
          gsvc.lengths(lengthParams);
          var graphicline = new Graphic(geometry, lineSymbol);
          map.graphics.add(graphicline);
          break;

        }
        case "polygon":{
          showPt = new Point(geometry.rings[0][0],map.spatialReference);
          var areasAndLengthParams = new AreasAndLengthsParameters();
          areasAndLengthParams.lengthUnit = esri.tasks.GeometryService.UNIT_KILOMETER;
          areasAndLengthParams.areaUnit = esri.tasks.GeometryService.UNIT_SQUARE_KILOMETERS;
          gsvc.simplify([geometry], function(simplifiedGeometries) {
            areasAndLengthParams.polygons = simplifiedGeometries;
            gsvc.areasAndLengths(areasAndLengthParams);
          });
          var graphicploy = new Graphic(geometry,polygonSymbol);
          map.graphics.add(graphicploy);
          break;
        }
      }




    }

    gsvc.on("lengths-complete",outputLength);
    function outputLength(evtObj){
      var result = evtObj.result;
      measureInfo(showPt, result.lengths[0].toFixed(2), "千米");
    };
    gsvc.on("areas-and-lengths-complete",outputAreaAndLength);
    function outputAreaAndLength(evtObj){
      var result = evtObj.result;
      measureInfo(showPt, result.areas[0].toFixed(2), "平方千米");
    };
    function measureInfo(showPnt,data,unit){
      var measureDiv=$("#measure");
      var isShow = false;
      var screenPnt=map.toScreen(showPnt);
      measureDiv.css("left",screenPnt.x+"px");
      measureDiv.css("top",screenPnt.y+"px");
      measureDiv.css("position","absolute");
      measureDiv.css("height","20px");
      measureDiv.css("display","block");
      isShow = true;
      measureDiv.css("z-index","999");
      if(unit==="千米"){
        measureDiv.css("width","90px");
      }
      else{
        measureDiv.css("width","130px");
      }
      $("#result").html(data+" "+unit);
      $("#infoclose").click(function(){
        map.graphics.clear();
        measureDiv.css("display","none");
        isShow = false;
      });

      map.on("pan-start", function(){
        measureDiv.css("display","none");
      });

      map.on("pan-end", function(panend){
        if(isShow){
          screenPnt=map.toScreen(showPnt);
          measureDiv.css("left",screenPnt.x+"px");
          measureDiv.css("top",screenPnt.y+"px");
          measureDiv.css("position","absolute");
          measureDiv.css("height","20px");
          measureDiv.css("display","block");
        }
      });
      map.on("zoom-start", function(){
        measureDiv.css("display","none");
      });
      map.on("zoom-end", function(){
        if(isShow){
          screenPnt=map.toScreen(showPnt);
          measureDiv.css("left",screenPnt.x+"px");
          measureDiv.css("top",screenPnt.y+"px");
          measureDiv.css("position","absolute");
          measureDiv.css("height","20px");
          measureDiv.css("display","block");
        }
      });

    };

    function requestData(){
      dojo.addOnLoad(function(resp){
        @foreach ($archives as $archive)
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
      @endforeach
      });
    }
  });


</script>
@endsection