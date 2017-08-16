// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/views/vectorTiles/WorkerTile","require exports dojo/Deferred ../../core/promiseUtils ../../core/executeAsync ../../core/ObjectPool ./VertexMemoryBuffer ./IndexMemoryBuffer ./TileParser ./BackgroundBucket ./FillBucket ./LineBucket ./SymbolBucket ./Placement ./GeometryUtils".split(" "),function(q,G,x,r,y,z,f,p,A,B,C,D,E,F,t){q=function(){function a(){this.status=this.rotation=0;this._symbolBuckets=[];this.placementEngine=new F.PlacementEngine;this.polygonVertexBuffer=
new f.PolygonMemoryBuffer;this.polygonOutlineVertexBuffer=new f.PolygonOutlineMemoryBuffer;this.polygonIndexBuffer=new p.TriangleElementMemoryBuffer;this.polygonOutlineIndexBuffer=new p.TriangleElementMemoryBuffer;this.lineVertexBuffer=new f.LineMemoryBuffer;this.lineIndexBuffer=new p.TriangleElementMemoryBuffer;this.markerVertexBuffer=new f.SymbolMemoryBuffer;this.markerIndexBuffer=new p.TriangleElementMemoryBuffer;this.textVertexBuffer=new f.SymbolMemoryBuffer;this.textIndexBuffer=new p.TriangleElementMemoryBuffer}
a.prototype.initialize=function(k,a,b,e){void 0===e&&(e=0);this.tileKey=k;this.refKey=a;this._workerTileHandler=b;this.rotation=e;this.placementEngine.setAngle(t.C_DEG_TO_RAD*e)};a.prototype.release=function(){this.tileKey=this.refKey="";this.rotation=this.status=0;this.polygonVertexBuffer.reset();this.polygonOutlineVertexBuffer.reset();this.polygonIndexBuffer.reset();this.polygonOutlineIndexBuffer.reset();this.lineVertexBuffer.reset();this.lineIndexBuffer.reset();this.markerVertexBuffer.reset();
this.markerIndexBuffer.reset();this.textVertexBuffer.reset();this.textIndexBuffer.reset();this.placementEngine.reset();this._symbolBuckets.length=0;this._workerTileHandler=null};a.prototype.setDataAndParse=function(a,n){var b=this,e=new x(function(a){b.status=6});this._parse(a,n).then(function(a){b.status=4;for(var k=new Uint32Array([2,b.polygonVertexBuffer.sizeInBytes,3,b.polygonOutlineVertexBuffer.sizeInBytes,6,b.polygonIndexBuffer.sizeInBytes,7,b.polygonOutlineIndexBuffer.sizeInBytes,0,b.lineVertexBuffer.sizeInBytes,
8,b.lineIndexBuffer.sizeInBytes,4,b.markerVertexBuffer.sizeInBytes,9,b.markerIndexBuffer.sizeInBytes,5,b.textVertexBuffer.sizeInBytes,10,b.textIndexBuffer.sizeInBytes]),d=[],l=a.length,m=0;m<l;m++){var c=a[m];if(c instanceof C)d.push(c.layerIndex),d.push(1),d.push(c.polygonIndexStart),d.push(c.polygonIndexCount),d.push(c.polygonOutlineIndexStart),d.push(c.polygonOutlineIndexCount);else if(c instanceof D)d.push(c.layerIndex),d.push(2),d.push(c.triangleIndexStart),d.push(c.triangleIndexCount),d.push(c.connectorStart),
d.push(c.connectorCount);else if(c instanceof E){d.push(c.layerIndex);d.push(3);d.push(c.sdfMarker?1:0);var g=c.markerPageMap;d.push(g.size);g.forEach(function(c,b){d.push(b);d.push(c[0]);d.push(c[1])});c=c.glyphsPageMap;d.push(c.size);c.forEach(function(c,b){d.push(b);d.push(c[0]);d.push(c[1])})}else c instanceof B&&(d.push(c.layerIndex),d.push(0))}a=new Uint32Array(d);var l=b.polygonVertexBuffer.toBuffer(),m=b.polygonOutlineVertexBuffer.toBuffer(),c=b.polygonIndexBuffer.toBuffer(),g=b.polygonOutlineIndexBuffer.toBuffer(),
u=b.lineVertexBuffer.toBuffer(),v=b.lineIndexBuffer.toBuffer(),w=b.markerVertexBuffer.toBuffer(),h=b.markerIndexBuffer.toBuffer(),n=b.textVertexBuffer.toBuffer(),f=b.textIndexBuffer.toBuffer();e.resolve({data:{bufferDataInfo:k.buffer,bucketDataInfo:a.buffer,bufferData:[l,m,c,g,u,v,w,h,n,f]},buffers:[l,c,m,g,u,v,w,h,n,f,k.buffer,a.buffer]})});return e.promise};a.prototype.addBucket=function(a){this._symbolBuckets.push(a)};a.prototype.updateSymbols=function(a){var n=this,b=this._symbolBuckets;if(!b||
0===b.length)return r.resolve({data:null});this.rotation=a;var e=this.placementEngine;e.reset();e.setAngle(a/256*360*t.C_DEG_TO_RAD);var f=this.markerVertexBuffer;f.reset();var k=this.markerIndexBuffer;k.reset();var d=this.textVertexBuffer;d.reset();var l=this.textIndexBuffer;l.reset();var m=[],c=b.length,g=0;return y(function(){if(6===n.status||0===n.status)return!0;if(g<c){var a=b[g++].copy(f,k,d,l,e);a&&(m.push(a),a.updateSymbols())}return g>=c},5).then(function(){if(6===n.status||0===n.status||
0===f.sizeInBytes&&0===k.sizeInBytes&&0===d.sizeInBytes&&0===l.sizeInBytes)return{data:null};var b=new Uint32Array([4,f.sizeInBytes,9,k.sizeInBytes,5,d.sizeInBytes,10,l.sizeInBytes]),a=[];c=m.length;for(var e=0;e<c;e++){var h=m[e];a.push(h.layerIndex);a.push(3);a.push(h.sdfMarker?1:0);var g=h.markerPageMap;a.push(g.size);g.forEach(function(b,c){a.push(c);a.push(b[0]);a.push(b[1])});h=h.glyphsPageMap;a.push(h.size);h.forEach(function(b,c){a.push(c);a.push(b[0]);a.push(b[1])})}var e=new Uint32Array(a),
h=f.toBuffer(),g=k.toBuffer(),p=d.toBuffer(),q=l.toBuffer();return{data:{bufferDataInfo:b.buffer,bucketDataInfo:e.buffer,bufferData:[h,g,p,q]},buffers:[h,g,p,q,b.buffer,e.buffer]}}).otherwise(function(a){return r.resolve({data:null})})};a.prototype.setObsolete=function(){this.status=6};a.prototype.getLayers=function(){return this._workerTileHandler.getLayers()};a.prototype.getWorkerTileHandler=function(){return this._workerTileHandler};a.prototype._parse=function(a,f){if(!a||0===a.byteLength)return r.resolve([]);
this.status=2;return(new A(a,this,f)).parse()};return a}();q.pool=new z(q);return q});