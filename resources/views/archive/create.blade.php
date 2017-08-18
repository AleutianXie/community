@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                    <a href="/" class="list-group-item">{{ __('archive.sidebar.list') }}</a>
                    <a href="/create" class="list-group-item active">{{ __('archive.sidebar.add') }}</a>
                    <a href="/map" class="list-group-item">{{ __('archive.sidebar.map') }}</a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-10">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">{{ __('archive.go') }}</button>
                    </p>
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('archive.sidebar.add') }}</div>

                        <div class="panel-body">
                            @include('messages')
                            {!! Form::open() !!}
                            <div class="input-group">
                                {!! Form::label('name', __('archive.name'), ['class' => 'input-group-addon']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('name')) }}</div>
                            </div>
                            <br/>
                            <div class="input-group">
                                {!! Form::label('address', __('archive.address'), ['class' => 'input-group-addon']) !!}
                                {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('address')) }}</div>
                            </div>
                            <br/>
                            <div class="input-group">
                                {!! Form::label('unit', __('archive.unit'), ['class' => 'input-group-addon']) !!}
                                {!! Form::number('unit', null, ['min' => 1, 'max' => 9999, 'class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('unit')) }}</div>
                                {!! Form::label('building', __('archive.building'), ['class' => 'input-group-addon']) !!}
                                {!! Form::number('building', null, ['min' => 1, 'max' => 9999, 'class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('building')) }}</div>
                                {!! Form::label('lift', __('archive.lift'), ['class' => 'input-group-addon']) !!}
                                {!! Form::number('lift', null, ['min' => 1, 'max' => 999, 'class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('lift')) }}</div>
                            </div>
                            <br/>
                            <div class="input-group">
                                {!! Form::label('property', __('archive.property'), ['class' => 'input-group-addon']) !!}
                                {!! Form::text('property', old('property'), ['class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('property')) }}</div>
                            </div>
                            <br/>
                            <div class="input-group">
                                {!! Form::label('principal', __('archive.principal'), ['class' => 'input-group-addon']) !!}
                                {!! Form::text('principal', old('principal'), ['class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('principal')) }}</div>
                                {!! Form::label('mobile', __('archive.mobile'), ['class' => 'input-group-addon']) !!}
                                {!! Form::text('mobile', old('mobile'), ['class' => 'form-control']) !!}
                                <div class="alert-danger">{{ __($errors->first('mobile')) }}</div>
                            </div>
                            <hr/>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        {{ __('archive.draw') }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <button id="Polygon" data-dojo-type="dijit/form/Button">绘制面数据</button>
    <button id="clear" data-dojo-type="dijit/form/Button">清除面数据</button>
                                    <div id="mapDiv" style="width:100%; height:500px; border:1px solid #000;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>文件：</label>
                                <div class="controls">
                                    <input type="file" id="aetherupload-file" onchange="AetherUpload.upload('file')"/><!--need to have an id "aetherupload-file" here for the file to be uploaded, 'file' is the default group name in config/aetherupload.php-->
                                    <div class="progress" style="height: 6px;margin-bottom: 2px;margin-top: 10px;width: 200px;">
                                        <div id="aetherupload-progressbar" style="background:blue;height:6px;width:0;"></div><!--need to have an id "aetherupload-progressbar" here for the progress bar-->
                                        <input type="hidden" name="geometry" id="geometry"></input>
                                    </div>
                                    <span style="font-size:12px;color:#aaa;" id="aetherupload-output">等待上传</span><!--need to have an id "aetherupload-output" here for the prompt message-->
                                </div>
                            </div>

                            <input type="hidden" name="savedpath" id="aetherupload-savedpath" value=""><!--need to have an id "aetherupload-savedpath"  and a name "savedpath" here for the saved path of the uploaded file-->
                            <hr/>
                            <div class="text-center">
                                {!! Form::submit(__('archive.submit'), ['class' => 'btn btn-primary']) !!}
                                {!! Form::reset(__('archive.reset'), ['class' => 'btn btn-default']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ URL::asset('js/spark-md5.min.js') }}"></script><!--need to have spark-md5.js for md5 calculation-->
<script src="{{ URL::asset('js/aetherupload.js') }}"></script><!--need to have aetherupload.js-->
<script>
    // this function will be called after file is uploaded successfully
    // you can get fileName,fileSize,uploadExt,chunkCount,chunkSize,subDir,group,savedPath of the uploaded file
    AetherUpload.success = function () {
        // Example
        $('#savedpath').val(this.savedPath);
    };

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

    require(["esri/map","esri/dijit/Popup","esri/dijit/PopupTemplate","esri/toolbars/draw","esri/symbols/SimpleMarkerSymbol","esri/symbols/SimpleLineSymbol", "esri/symbols/SimpleFillSymbol","esri/renderers/ClassBreaksRenderer","tdlib/ClusterLayer","esri/geometry/webMercatorUtils", "esri/graphic","esri/Color","esri/layers/GraphicsLayer", "esri/SpatialReference","tdlib/TDTLayer","tdlib/TDTAnnoLayer","esri/geometry/Point","dojo/parser","dijit/registry","dijit/form/Button", "dojo/domReady!"],
    function(Map,Popup, PopupTemplate,Draw,SimpleMarkerSymbol, SimpleLineSymbol, SimpleFillSymbol, ClassBreaksRenderer,ClusterLayer,webMercatorUtils,Graphic,Color,GraphicsLayer,SpatialReference,TDTLayer,TDTAnnoLayer,Point,parser,registry,Button) {
        parser.parse();
        var popupOptions = {
                        titleInBody: false,
                        highlight: true,
                        marginTop: 60,
                        width: 100
                };
                var popup = new esri.dijit.Popup(popupOptions, dojo.create("div"));
        map=new Map("mapDiv",{ logo:false,infoWindow: popup});
        // map.on('load', function() {
        //                 addGraphic();
        //             });
        var nhbasemap = new TDTLayer();
        map.addLayer(nhbasemap);
        var nhannolayer=  new TDTAnnoLayer();
        map.addLayer(nhannolayer);

        map.centerAndZoom(new Point({"x": 121.42018376109351, "y": 29.291107035766274, "spatialReference": {"wkid": 4490 } }),15);
        var graLayer = new GraphicsLayer({id:"xiaoqu"});
                map.addLayer(graLayer);
                var clusterLayer;

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
