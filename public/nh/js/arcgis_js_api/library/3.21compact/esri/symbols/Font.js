// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/symbols/Font","dojo/_base/declare dojo/_base/lang dojo/sniff dojox/gfx/_base ../kernel ../lang".split(" "),function(c,d,f,e,k,l){c=c(null,{declaredClass:"esri.symbol.Font",constructor:function(a,b,c,g,h){a?d.isObject(a)?d.mixin(this,a):(this.size=a,parseFloat(this.size)==this.size&&(this.size+="px"),void 0!==b&&(this.style=b),void 0!==c&&(this.variant=c),void 0!==g&&(this.weight=g),void 0!==h&&(this.family=h)):d.mixin(this,e.defaultFont);parseFloat(this.size)==this.size&&(this.size+=
"pt");9>f("ie")&&this.size&&d.isString(this.size)&&-1<this.size.indexOf("em")&&(this.size=e.pt2px(12*parseFloat(this.size))+"px");this.size=this._convert2PxSize(this.size)},setSize:function(a){this.size=this._convert2PxSize(a);return this},_convert2PxSize:function(a){var b;parseFloat(a)==a?b=a:d.isString(a)&&(-1<a.indexOf("pt")?b=e.pt2px(parseFloat(a)):-1<a.indexOf("px")?b=parseFloat(a):-1<a.indexOf("em")?b=e.pt2px(12*parseFloat(a)):-1<a.indexOf("%")&&(b=e.pt2px(.12*parseFloat(a))));return b},setStyle:function(a){this.style=
a;return this},setVariant:function(a){this.variant=a;return this},setWeight:function(a){this.weight=a;return this},setFamily:function(a){this.family=a;return this},setDecoration:function(a){this.decoration=a;return this},toJson:function(){return l.fixJson({size:e.px2pt(this.size),style:this.style,variant:this.variant,decoration:this.decoration,weight:this.weight,family:this.family})}});d.mixin(c,{STYLE_NORMAL:"normal",STYLE_ITALIC:"italic",STYLE_OBLIQUE:"oblique",VARIANT_NORMAL:"normal",VARIANT_SMALLCAPS:"small-caps",
WEIGHT_NORMAL:"normal",WEIGHT_BOLD:"bold",WEIGHT_BOLDER:"bolder",WEIGHT_LIGHTER:"lighter"});f("extend-esri")&&d.setObject("symbol.Font",c,k);return c});