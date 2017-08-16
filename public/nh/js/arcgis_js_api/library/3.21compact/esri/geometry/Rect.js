// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/geometry/Rect","dojo/_base/declare dojo/_base/lang dojo/has dojox/gfx/_base ../kernel ../SpatialReference ./Geometry ./Point ./Extent ../srUtils".split(" "),function(k,c,l,m,g,t,n,p,q,r){function h(a){return new q(parseFloat(a.x),parseFloat(a.y)-parseFloat(a.height),parseFloat(a.x)+parseFloat(a.width),parseFloat(a.y),a.spatialReference)}var b=k(n,{declaredClass:"esri.geometry.Rect",constructor:function(a,d,b,e,f){c.mixin(this,m.defaultRect);c.isObject(a)&&"extent"===a.type&&(d=a.ymax,
b=a.getWidth(),e=a.getHeight(),f=a.spatialReference,a=a.xmin);c.isObject(a)?(c.mixin(this,a),this.spatialReference&&(this.spatialReference=r.createSpatialReference(this.spatialReference))):(this.x=a,this.y=d,this.width=b,this.height=e,this.spatialReference=f);this.verifySR()},getCenter:function(){return new p(this.x+this.width/2,this.y+this.height/2,this.spatialReference)},offset:function(a,d){return new b(this.x+a,this.y+d,this.width,this.height,this.spatialReference)},intersects:function(a){return a.x+
a.width<=this.x||a.y+a.height<=this.y||a.y>=this.y+this.height||a.x>=this.x+this.width?!1:!0},getExtent:function(){return h(this)},update:function(a,b,c,e,f){this.x=a;this.y=b;this.width=c;this.height=e;this.spatialReference=f;this.clearCache();return this}});l("extend-esri")&&(c.setObject("geometry.Rect",b,g),g.geometry._rectToExtent=h,g.geometry._extentToRect=function(a){return new b(a)});return b});