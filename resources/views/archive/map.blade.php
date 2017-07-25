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
    <button id="ToNinghai" type="button" ></button><br />
    <div id="mapDiv" style="width:98%; border:1px solid #000;"></div>

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
                                <link rel="stylesheet" href="http://js.arcgis.com/3.6/js/esri/css/esri.css">
    <link rel="stylesheet" href="http://js.arcgis.com/3.6/js/dojo/dijit/themes/tundra/tundra.css">

    <script src="http://js.arcgis.com/3.7/"></script>
<script type="text/javascript">

    var map;
    require(["esri/map", "tdlib/TDTLayer","tdlib/TDTAnnoLayer","esri/geometry/Point","dijit/form/Button","dojo/domReady!"],
    function(Map,TDTLayer,TDTAnnoLayer,Point,Button) {
        map=new Map("mapDiv",{ logo:false});
        var nhbasemap = new TDTLayer();
        map.addLayer(nhbasemap);
        var nhannolayer=  new TDTAnnoLayer();
        map.addLayer(nhannolayer);

        map.centerAndZoom(new Point({"x": 121.42018376109351, "y": 29.291107035766274, "spatialReference": {"wkid": 4490 } }),11);

        var button = new Button({
            label: "宁海",
            onClick: function(){
                    map.centerAt(new esri.geometry.Point(121.42018376109351,29.291107035766274, new esri.SpatialReference({ wkid: 4490 })));
                }}
            , "ToNinghai");
      });
</script>
@endsection