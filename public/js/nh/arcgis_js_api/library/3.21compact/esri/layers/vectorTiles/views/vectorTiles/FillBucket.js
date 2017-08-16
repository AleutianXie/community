// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/views/vectorTiles/FillBucket","require exports ../../core/tsSupport/extendsHelper ../../core/tsSupport/decorateHelper ./Bucket ./Geometry ../../core/libs/earcut/earcut".split(" "),function(A,B,x,C,y,v,z){return function(w){function f(b,l,e,d,a,c){b=w.call(this,b,l)||this;b.polygonVertexBuffer=e;b.polygonIndexBuffer=d;b.polygonOutlineVertexBuffer=a;b.polygonOutlineIndexBuffer=c;return b}x(f,w);Object.defineProperty(f.prototype,"polygonIndexStart",{get:function(){return this._triangleElementsStart},
enumerable:!0,configurable:!0});Object.defineProperty(f.prototype,"polygonIndexCount",{get:function(){return this._triangleElementsNum},enumerable:!0,configurable:!0});Object.defineProperty(f.prototype,"polygonOutlineIndexStart",{get:function(){return this._outlineElementsStart},enumerable:!0,configurable:!0});Object.defineProperty(f.prototype,"polygonOutlineIndexCount",{get:function(){return this._outlineElementsNum},enumerable:!0,configurable:!0});f.prototype.assignBufferInfo=function(b){b._triangleElementsStart=
this._triangleElementsStart;b._triangleElementsNum=this._triangleElementsNum;b.layer.hasPaintProperty("fill-outline-color")?(b._outlineElementsStart=this._outlineElementsStart,b._outlineElementsNum=this._outlineElementsNum):(b._outlineElementsStart=0,b._outlineElementsNum=0)};f.prototype.processFeatures=function(b,l){this._triangleElementsStart=this.polygonIndexBuffer.index;this._triangleElementsNum=0;this._outlineElementsStart=this.polygonOutlineIndexBuffer.index;this._outlineElementsNum=0;b&&b.setExtent(this.layerExtent);
for(var e=this.layer.getPaintValue("fill-pattern",this.zoom),e=this.layer.getPaintValue("fill-antialias",this.zoom)&&void 0===e,d=0,a=this._features;d<a.length;d++){var c=a[d].getGeometry(b);this._processFeature(c,e)}};f.prototype._processFeature=function(b,l){if(b){var e=b.length;if(l)for(var d=0;d<e;d++)this._processOutline(b[d]);for(var a,d=0;d<e;d++){var c=f._area(b[d]);128<c?(void 0!==a&&this._processFill(b,a),a=[d]):-128>c&&void 0!==a&&a.push(d)}void 0!==a&&this._processFill(b,a)}};f.prototype._processOutline=
function(b){var l=this.polygonOutlineVertexBuffer,e=this.polygonOutlineIndexBuffer,d=e.index,a,c,f,h=new v.Point(0,0),n=new v.Point(0,0),m=new v.Point(0,0),k=-1,g=-1,r=a=-1,u=-1,p=b.length;if(!(2>p)){var t=b[0];for(a=b[p-1];p&&a.isEqual(t);)--p,a=b[p-1];if(!(2>p-0)){for(t=0;t<p;++t){0===t?(a=b[p-1],c=b[0],f=b[1],h.assignSub(c,a),h.normalize(),h.rightPerpendicular()):(a=c,c=f,f=t!==p-1?b[t+1]:b[0],h.assign(n));n.assignSub(f,c);n.normalize();n.rightPerpendicular();a=h.x*n.y-h.y*n.x;m.assignAdd(h,n);
m.normalize();var q=-m.x*-h.x+-m.y*-h.y,q=Math.abs(0!==q?1/q:1);8<q&&(q=8);0<=a?(a=l.add(c.x,c.y,h.x,h.y,0,1),-1===r&&(r=a),0<=k&&0<=g&&0<=a&&e.add(k,g,a),g=l.add(c.x,c.y,q*-m.x,q*-m.y,0,-1),-1===u&&(u=g),0<=k&&0<=g&&0<=a&&e.add(k,g,a),k=g,g=a,a=l.add(c.x,c.y,m.x,m.y,0,1),0<=k&&0<=g&&0<=a&&e.add(k,g,a),g=l.add(c.x,c.y,n.x,n.y,0,1)):(a=l.add(c.x,c.y,q*m.x,q*m.y,0,1),-1===r&&(r=a),0<=k&&0<=g&&0<=a&&e.add(k,g,a),g=l.add(c.x,c.y,-h.x,-h.y,0,-1),-1===u&&(u=g),0<=k&&0<=g&&0<=a&&e.add(k,g,a),k=g,g=a,a=l.add(c.x,
c.y,-m.x,-m.y,0,-1),0<=k&&0<=g&&0<=a&&e.add(k,g,a),k=l.add(c.x,c.y,-n.x,-n.y,0,-1));0<=k&&0<=g&&0<=a&&e.add(k,g,a)}0<=k&&0<=g&&0<=r&&e.add(k,g,r);0<=k&&0<=r&&0<=u&&e.add(k,u,r);this._outlineElementsNum+=3*(e.index-d)}}};f.prototype._processFill=function(b,l){var e;1<l.length&&(e=[]);for(var d=0,a=0;a<l.length;a++){var c=l[a];0!==d&&e.push(d);d+=b[c].length}for(var d=2*d,a=new Float64Array(d),f=0,h=0;h<l.length;h++)for(var c=l[h],c=b[c],n=c.length,m=0;m<n;++m)a[f++]=c[m].x,a[f++]=c[m].y;e=z(a,e,2);
f=e.length;if(0<f){h=this.polygonVertexBuffer.index;for(c=0;c<d;)this.polygonVertexBuffer.add(a[c++],a[c++]);for(d=0;d<f;)this.polygonIndexBuffer.add(h+e[d++],h+e[d++],h+e[d++]);this._triangleElementsNum+=f}};f._area=function(b){for(var f=0,e=b.length-1,d=0;d<e;d++)f+=(b[d].x-b[d+1].x)*(b[d].y+b[d+1].y);f+=(b[e].x-b[0].x)*(b[e].y+b[0].y);return.5*f};return f}(y)});