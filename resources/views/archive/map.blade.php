@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                    <a href="/" class="list-group-item">{{ __('archive.sidebar.list') }}</a>
                    <a href="/create" class="list-group-item">{{ __('archive.sidebar.add') }}</a>
                    <a href="/map" class="list-group-item active">{{ __('archive.sidebar.map') }}</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-10">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">{{ __('archive.go') }}</button>
                    </p>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('archive.sidebar.map') }}</div>

                        <div class="panel-body">
                            @include('messages')
    <button id="ToNinghai" data-dojo-type="dijit/form/Button">宁海</button>
    <button id="Polygon" data-dojo-type="dijit/form/Button">绘制面数据</button>
    <button id="clear" data-dojo-type="dijit/form/Button">清除面数据</button>
    <button id="phpdata" data-dojo-type="dijit/form/Button">PHP传输</button>
    <div id="mapDiv" style="width:100%; height:100%; border:1px solid #000;"></div>

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
        dojoConfig = {
            parseOnLoad: true,
            packages: [{
                name: 'tdlib',
                location: "/nh/js/tdlib"
            }]
        };
    </script>
      <link rel="stylesheet" href="https://js.arcgis.com/3.21/dijit/themes/claro/claro.css">
    <link rel="stylesheet" href="https://js.arcgis.com/3.21/esri/css/esri.css">

   <script src="https://js.arcgis.com/3.21/"></script>
    <script type="text/javascript">
    var map,tb;

    require(["esri/map","esri/dijit/Popup","esri/dijit/PopupTemplate","esri/toolbars/draw","esri/symbols/SimpleMarkerSymbol","esri/symbols/SimpleLineSymbol", "esri/symbols/SimpleFillSymbol", "esri/graphic","esri/Color","esri/layers/GraphicsLayer", "esri/SpatialReference","tdlib/TDTLayer","tdlib/TDTAnnoLayer","esri/geometry/Point","dojo/parser","dijit/registry","dijit/form/Button", "dojo/domReady!"],
    function(Map,Popup, PopupTemplate,Draw,SimpleMarkerSymbol, SimpleLineSymbol, SimpleFillSymbol, Graphic,Color,GraphicsLayer,SpatialReference,TDTLayer,TDTAnnoLayer,Point,parser,registry,Button) {
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
        var nhbasemap = new TDTLayer();
        map.addLayer(nhbasemap);
        var nhannolayer=  new TDTAnnoLayer();
        map.addLayer(nhannolayer);

        map.centerAndZoom(new Point({"x": 121.42018376109351, "y": 29.291107035766274, "spatialReference": {"wkid": 4490 } }),11);
        var graLayer = new GraphicsLayer({id:"xiaoqu"});
        map.addLayer(graLayer);

        registry.byId("ToNinghai").on("click", function() {
            map.centerAt(new esri.geometry.Point(121.42018376109351,29.291107035766274, new esri.SpatialReference({ wkid: 4490 })));
        });

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
              //evt.geometry.rings[0] 坐标串
              //evt.geometry.spatialReference.wkid 参考系
              //evt.geometry.type  图形类型
              //
              //https://developers.arcgis.com/javascript/3/jssamples/toolbar_draw.html
          }

          function requestData(){
          dojo.xhrGet({
                     handle:function(resp){
                            //获取图形
                                @foreach ($archives as $archive)
                                var geo = $.parseJSON('{!! $archive->geometry !!}');

                                //绘制图形
                                var polygon = new esri.geometry.Polygon(new SpatialReference({wkid:4490}));
                                polygon.rings = geo.rings;
                                var symbol = new SimpleFillSymbol(SimpleFillSymbol.STYLE_SOLID,
                                        new SimpleLineSymbol(SimpleLineSymbol.STYLE_DASHDOT,
                                        new Color([255,0,0]), 2),new Color([255,255,0,0.25]));
                                 //var polygon = new esri.geometry.Polygon(resp);
                                 var graphic = new Graphic(polygon,symbol);
                                 graLayer.add(graphic);
                                 map.centerAndZoom(graphic.geometry.getCentroid(),15);
                                 //graphic.toJson();  转成json数据保存

                                //添加图标

                                var symbol = new esri.symbol.PictureMarkerSymbol("/nh/images/grn_pushpin_48px.png", 48, 48);

                                //创建模版
                                var popupTemplate = esri.dijit.PopupTemplate({
                                      title: "{{ $archive->name }}",
                                      fieldInfos: [{
                                          fieldName: "address",
                                          label: "{{ __('archive.address') }}",
                                          visible: true
                                        }, {
                                          fieldName: "unit",
                                          label: "{{ __('archive.unit') }}",
                                          visible: true
                                        }, {
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
                                          fieldName: "Link",
                                          label: "更多详细信息",
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

                                attributes["Link"]="http://www.baidu.com";
                                var ptgraphic = new esri.Graphic(graphic.geometry.getCentroid(), symbol, attributes, popupTemplate);
                                graLayer.add(ptgraphic);
                                @endforeach


                    }

              });
      }

          registry.byId("phpdata").on("click", function() {
              requestData();
        });


      });





</script>
@endsection