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

                        <div id="mapDiv" style="width:100%; height:100%; border:1px solid #000;"></div>
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
        requestData();
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
        @foreach ($archives as $archive)
        var geo = $.parseJSON('{!! $archive->geometry !!}');

        var polygon = new esri.geometry.Polygon(new SpatialReference({wkid:4490}));
        polygon.rings = geo.rings;

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