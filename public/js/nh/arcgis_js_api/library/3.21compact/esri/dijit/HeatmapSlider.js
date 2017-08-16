// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
require({cache:{"url:esri/dijit/HeatmapSlider/templates/HeatmapSlider.html":'\x3cdiv class\x3d"${baseClass}"\x3e\r\n  \x3cdiv data-dojo-attach-point\x3d"_containerNode"\x3e\r\n  \x3cdiv data-dojo-attach-point\x3d"_titleNode"\x3e\x3c/div\x3e\r\n  \x3cdiv data-dojo-attach-point\x3d"_sliderNode"\x3e\x3c/div\x3e\r\n  \x3cdiv data-dojo-attach-point\x3d"_scaleNode"\x3e\x3c/div\x3e\r\n  \x3c/div\x3e\r\n\x3c/div\x3e'}});
define("esri/dijit/HeatmapSlider","../kernel ../dijit/RendererSlider ../dijit/RendererSlider/sliderUtils dijit/_TemplatedMixin dijit/_WidgetBase dojo/_base/array dojo/_base/declare dojo/_base/lang dojo/debounce dojo/dom-style dojo/Evented dojo/has dojox/gfx dojo/i18n!../nls/jsapi dojo/text!./HeatmapSlider/templates/HeatmapSlider.html".split(" "),function(g,h,c,k,l,d,m,b,n,e,p,q,r,f,t){c=m([l,k,p],{declaredClass:"esri.dijit.HeatmapSlider",baseClass:"esriHeatmapSlider",templateString:t,rampWidth:26,
handles:[3,15],minSliderValue:0,maxSliderValue:1,showLabels:!0,showTicks:!0,showHandles:!0,_rampNode:null,_sliderHeight:null,_colorRampSurface:null,_surfaceRect:null,_updateTimer:null,constructor:function(a,b){this.inherited(arguments);b&&(this._updateTimeout=n(this._updateTimeout,0))},postCreate:function(){this.inherited(arguments);this._setupDataDefaults()},startup:function(){this.inherited(arguments);this._slider=new h({type:"HeatmapSlider",values:this.values,minimum:this.minSliderValue,maximum:this.maxSliderValue,
precision:2,showLabels:this.showLabels,showTicks:this.showTicks,showHandles:this.showHandles,minLabel:f.widgets.rendererSlider.low,maxLabel:f.widgets.rendererSlider.high},this._sliderNode);this._slider.startup();this._rampNode=this._slider._sliderAreaRight;this._sliderHeight=e.get(this._rampNode,"height")||155;this._createSVGSurfaces();this._slider.on("slide",b.hitch(this,function(a){this._updateColorStops(a.values[0],a.values[1]);this._fillRamp()}));this._slider.on("change",b.hitch(this,function(a){this.set("values",
[a.values[0],a.values[1]]);this.emit("change",b.clone(this.colorStops))}));this._slider.on("handle-value-change",b.hitch(this,function(a){this._updateRendererSlider()}));this._slider.on("data-value-change",b.hitch(this,function(a){this._updateRendererSlider()}));this._slider.on("stop",b.hitch(this,function(a){this.emit("handle-value-change",b.clone(this.colorStops))}));this.watch("colorStops",this._updateTimeout)},destroy:function(){this.inherited(arguments);this._slider&&this._slider.destroy()},
_updateTimeout:function(){this._updateRendererSlider()},_updateRendererSlider:function(){this.set("values",[this.colorStops[3].ratio,this.colorStops[15].ratio]);this._slider.set("values",this.values);this._slider._reset();this._slider._updateRoundedLabels();this._slider._generateMoveables();this._clearRect();this._createSVGSurfaces()},_setupDataDefaults:function(){this.set("values",[this.colorStops[3].ratio,this.colorStops[15].ratio])},_createSVGSurfaces:function(){this._colorRampSurface=r.createSurface(this._rampNode,
this.rampWidth-2,this._sliderHeight-2);e.set(this._colorRampSurface.rawNode,"border","1px solid #888");this._surfaceRect=this._colorRampSurface.createRect({width:this.rampWidth,height:this._sliderHeight});this._fillRamp()},_clearRect:function(){this._colorRampSurface.destroy()},_updateColorStops:function(a,u){d.forEach(this.colorStops,b.hitch(this,function(b,c){2<c&&(b.ratio=a+(c-3)/12*(u-a),3===c&&b.ratio<this.colorStops[2].ratio&&(b.ratio=this.colorStops[2].ratio))}))},_fillRamp:function(){var a=
this.colorStops.slice(0);d.forEach(a,function(a){a.offset=1-a.ratio});a.reverse();this._surfaceRect.setFill({type:"linear",x1:0,y1:0,x2:0,y2:this._sliderHeight/.99,colors:a})}});q("extend-esri")&&b.setObject("dijit.HeatmapSlider",c,g);return c});