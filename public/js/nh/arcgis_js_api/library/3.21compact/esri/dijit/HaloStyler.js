// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
require({cache:{"url:esri/dijit/HaloStyler/templates/HaloStyler.html":'\x3cdiv class\x3d"${_css.container}"\x3e\r\n  \x3cdiv class\x3d"${_css.topContainer}"\x3e\r\n    \x3clabel\x3e${i18n.common.apply}\x3c/label\x3e\r\n    \x3cinput data-dojo-attach-point\x3d"_haloCheckBox" data-dojo-type\x3d"dijit/form/CheckBox" checked\x3dfalse type\x3d"checkbox"\x3e\r\n    \x3cselect class\x3d"${_css.haloSelect}" data-dojo-attach-point\x3d"_haloSizeSelect" data-dojo-type\x3d"dijit/form/Select"\x3e\r\n      \x3coption value\x3d"0"\x3e0\x3c/option\x3e\r\n      \x3coption value\x3d"1" selected\x3d"selected"\x3e1\x3c/option\x3e\r\n      \x3coption value\x3d"2"\x3e2\x3c/option\x3e\r\n      \x3coption value\x3d"3"\x3e3\x3c/option\x3e\r\n      \x3coption value\x3d"4"\x3e4\x3c/option\x3e\r\n      \x3coption value\x3d"5"\x3e5\x3c/option\x3e\r\n      \x3coption value\x3d"6"\x3e6\x3c/option\x3e\r\n      \x3coption value\x3d"7"\x3e7\x3c/option\x3e\r\n      \x3coption value\x3d"8"\x3e8\x3c/option\x3e\r\n      \x3coption value\x3d"9"\x3e9\x3c/option\x3e\r\n      \x3coption value\x3d"10"\x3e10\x3c/option\x3e\r\n    \x3c/select\x3e\r\n  \x3c/div\x3e\r\n  \x3cdiv data-dojo-attach-point\x3d"_haloColorPaletteNode"\x3e\x3c/div\x3e\r\n\x3c/div\x3e'}});
define("esri/dijit/HaloStyler","require dojo/_base/declare dojo/_base/lang dojo/has dojo/on ../kernel dijit/_Widget dijit/_TemplatedMixin dijit/_WidgetsInTemplateMixin dijit/ColorPalette dijit/form/Select dijit/form/CheckBox dojo/text!./HaloStyler/templates/HaloStyler.html dojo/i18n!../nls/jsapi".split(" "),function(c,e,b,f,d,g,h,k,l,m,q,r,n,p){c=e([h,k,l],{declaredClass:"esri.dijit.HaloStyler",templateString:n,widgetsInTemplate:!0,i18n:p,haloColor:null,haloEnabled:!1,haloSize:0,value:{},_defaultPaletteSize:"7x10",
_defaultHaloColor:"#ffffff",_css:{container:"esri-halo-styler",topContainer:"esri-halo-styler-top-container",haloSelect:"esri-halo-styler-select"},postCreate:function(){this.inherited(arguments);this._setupDijits()},_setValueAttr:function(a){this._haloColorPalette&&(this.set("haloSize",a.haloSize||1),this._haloSizeSelect.set("value",this.get("haloSize")),this.set("haloColor",a.haloColor),this._haloColorPalette.set("value",this.get("haloColor")),this.set("haloEnabled",0<a.haloSize?!0:!1),this._haloCheckBox.set("checked",
this.get("haloEnabled")))},_setupDijits:function(){this._haloCheckBox.set("checked",this.get("haloEnabled"));this._haloSizeSelect.set("value",this.get("haloSize"));this._createHaloColorPicker();this.own(d(this._haloCheckBox,"change",b.hitch(this,this._onHaloCheckboxChange)),d(this._haloSizeSelect,"change",b.hitch(this,this._onHaloSizeChange)))},_createHaloColorPicker:function(){this._haloColorPalette=new m({palette:this._defaultPaletteSize,value:this.get("haloColor")},this._haloColorPaletteNode);
this._haloColorPalette.startup();this.own(d(this._haloColorPalette,"change",b.hitch(this,this._onHaloColorChange)))},_onHaloCheckboxChange:function(a){this.set("haloEnabled",this._haloCheckBox.checked);this._haloCheckBox.checked&&0<this.get("haloSize")&&null===this.get("haloColor")&&(this._haloColorPalette.set("value",this._defaultHaloColor),this.set("haloColor",this._defaultHaloColor));this._onChange()},_onHaloSizeChange:function(a){this.set("haloSize",this._haloSizeSelect.value);this._onChange()},
_onHaloColorChange:function(a){a=this._haloColorPalette?this._haloColorPalette.value:a;a!==this.get("haloColor")&&(this.set("haloColor",a),this._onChange())},_onChange:function(){this.emit("change",{enabled:this.get("haloEnabled"),size:this.get("haloSize"),color:this.get("haloColor")})}});f("extend-esri")&&b.setObject("dijit.HaloStyler",c,g);return c});