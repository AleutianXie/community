// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/graphicsUtils",["dojo/_base/lang","dojo/_base/array","dojo/has","./kernel","./geometry/Extent"],function(l,f,m,n,h){var k={graphicsExtent:function(b){if(!b||!b.length)return null;var a=b[0].geometry,c=a.getExtent(),d,e,g=b.length;null===c&&(c=new h(a.x,a.y,a.x,a.y,a.spatialReference));for(e=1;e<g;e++)d=(a=b[e].geometry).getExtent(),null===d&&(d=new h(a.x,a.y,a.x,a.y,a.spatialReference)),c=c.union(d);return 0>c.getWidth()&&0>c.getHeight()?null:c},getGeometries:function(b){return f.map(b,
function(a){return a.geometry})},_encodeGraphics:function(b,a){var c=[],d,e,g;f.forEach(b,function(b,f){d=b.toJson();e={};d.geometry&&(g=a&&a[f],e.geometry=g&&g.toJson()||d.geometry);d.attributes&&(e.attributes=d.attributes);c[f]=e});return c}};m("extend-esri")&&l.mixin(n,k);return k});