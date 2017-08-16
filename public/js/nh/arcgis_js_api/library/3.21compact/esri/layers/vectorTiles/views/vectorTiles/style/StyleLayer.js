// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/views/vectorTiles/style/StyleLayer",["require","exports","./StyleDefinition","./StyleProperty","./Filter"],function(d,g,f,k,l){Object.defineProperty(g,"__esModule",{value:!0});d=function(){function a(b,a,e){this.type=b;this.id=a.id;this.source=a.source;this.sourceLayer=a["source-layer"];this.minzoom=a.minzoom;this.maxzoom=a.maxzoom;this.filter=a.filter;this.layout=a.layout;this.paint=a.paint;this.z=e;switch(b){case 0:this._layoutDefinition=f.StyleDefinition.backgroundLayoutDefinition;
this._paintDefinition=f.StyleDefinition.backgroundPaintDefinition;break;case 1:this._layoutDefinition=f.StyleDefinition.fillLayoutDefinition;this._paintDefinition=f.StyleDefinition.fillPaintDefinition;break;case 2:this._layoutDefinition=f.StyleDefinition.lineLayoutDefinition;this._paintDefinition=f.StyleDefinition.linePaintDefinition;break;case 3:this._layoutDefinition=f.StyleDefinition.symbolLayoutDefinition,this._paintDefinition=f.StyleDefinition.symbolPaintDefinition}this._layoutProperties=this._parseLayout(this.layout);
this._paintProperties=this._parsePaint(this.paint)}a.prototype.getFeatureFilter=function(){return void 0!==this._featureFilter?this._featureFilter:this._featureFilter=l.createFilter(this.filter)};a.prototype.hasLayoutProperty=function(a){var b=this._layoutProperties;return b&&b[a]?!0:!1};a.prototype.hasPaintProperty=function(a){var b=this._paintProperties;return b?void 0!==b[a]:!1};a.prototype.getLayoutValue=function(a,h){var b,c=this._layoutProperties;c&&(c=c[a])&&(b=c.getValue(h));c=this._layoutDefinition[a];
void 0===b&&(b=c["default"]);"enum"===c.type&&(b=c.values.indexOf(b));return b};a.prototype.getPaintValue=function(a,h){var b,c=this._paintProperties;c&&(c=c[a])&&(b=c.getValue(h));c=this._paintDefinition[a];void 0===b&&(b=c["default"]);"enum"===c.type&&(b=c.values.indexOf(b));return b};a.prototype._parseLayout=function(a){var b={},e;for(e in a)b[e]=new k(this._layoutDefinition[e],a[e]);return b};a.prototype._parsePaint=function(a){var b={},e;for(e in a)b[e]=new k(this._paintDefinition[e],a[e]);return b};
return a}();g.StyleLayer=d;d=function(){return function(a,b){this.cap=a.getLayoutValue("line-cap",b);this.join=a.getLayoutValue("line-join",b);this.miterLimit=a.getLayoutValue("line-miter-limit",b);this.roundLimit=a.getLayoutValue("line-round-limit",b)}}();g.LineLayout=d;d=function(){return function(a,b,d){this.allowOverlap=a.getLayoutValue("icon-allow-overlap",b);this.ignorePlacement=a.getLayoutValue("icon-ignore-placement",b);this.optional=a.getLayoutValue("icon-optional",b);this.rotationAlignment=
a.getLayoutValue("icon-rotation-alignment",b);this.size=a.getLayoutValue("icon-size",b);this.rotate=a.getLayoutValue("icon-rotate",b);this.padding=a.getLayoutValue("icon-padding",b);this.keepUpright=a.getLayoutValue("icon-keep-upright",b);this.offset=a.getLayoutValue("icon-offset",b);d&&1===this.rotationAlignment&&!a.hasLayoutProperty("icon-rotation-alignment")&&(this.rotationAlignment=0)}}();g.IconLayout=d;d=function(){return function(a,b,d){this.allowOverlap=a.getLayoutValue("text-allow-overlap",
b);this.ignorePlacement=a.getLayoutValue("text-ignore-placement",b);this.optional=a.getLayoutValue("text-optional",b);this.rotationAlignment=a.getLayoutValue("text-rotation-alignment",b);this.font=a.getLayoutValue("text-font",b);this.maxWidth=a.getLayoutValue("text-max-width",b);this.lineHeight=a.getLayoutValue("text-line-height",b);this.letterSpacing=a.getLayoutValue("text-letter-spacing",b);this.justify=a.getLayoutValue("text-justify",b);this.anchor=a.getLayoutValue("text-anchor",b);this.maxAngle=
a.getLayoutValue("text-max-angle",b);this.size=a.getLayoutValue("text-size",b);this.rotate=a.getLayoutValue("text-rotate",b);this.padding=a.getLayoutValue("text-padding",b);this.keepUpright=a.getLayoutValue("text-keep-upright",b);this.transform=a.getLayoutValue("text-transform",b);this.offset=a.getLayoutValue("text-offset",b);d&&1===this.rotationAlignment&&!a.hasLayoutProperty("text-rotation-alignment")&&(this.rotationAlignment=0)}}();g.TextLayout=d});