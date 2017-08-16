// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/views/2d/tiling/TileStrategy",["require","exports","../../../core/tsSupport/extendsHelper","./TileKey"],function(y,z,A,p){var k=new p(0,0,0,0),d=new Map,h=[],l=[];return function(){function g(a){this._previousResolution=Number.POSITIVE_INFINITY;this.cachePolicy="keep";this.tileIndex=new Map;this.tiles=[];this.acquireTile=a.acquireTile;this.releaseTile=a.releaseTile;this.tileInfoView=a.tileInfoView;a.cachePolicy&&(this.cachePolicy=a.cachePolicy)}g.prototype.destroy=
function(){this.tileIndex.clear()};g.prototype.update=function(a){var q=this,c=this.tileIndex,f=this.tileInfoView.getTileCoverage(a.state);if(f){var e=f.spans,g=f.lodInfo,t=g.level,b=a.state.resolution,m=!a.stationary&&b>this._previousResolution;this._previousResolution=b;this.tiles.length=0;d.clear();var u=0,v=0;if(0<e.length)for(var r=0;r<e.length;r++){a=e[r];for(var p=a.row,w=a.colTo,n=a.colFrom;n<=w;n++)u++,a=k.set(t,p,g.normalizeCol(n),g.getWorldForColumn(n)).id,c.has(a)?(b=c.get(a),b.attached?
(d.set(a,b),v++):b.attached||m||this._addParentTile(a,d)):(b=this.acquireTile(k),this.tileIndex.set(a,b),m||this._addParentTile(a,d))}var x=v===u;l.length=0;h.length=0;c.forEach(function(a,b){k.set(b);if(!d.has(b)){var c=q.tileInfoView.intersects(f,k);!c||!m&&x?"purge"===q.cachePolicy?h.push(b):(k.level>t||!c)&&h.push(b):a.attached?l.push(b):m&&h.push(b)}});for(e=0;e<l.length;e++)a=l[e],(b=c.get(a))&&b.attached&&d.set(a,b);for(e=0;e<h.length;e++)a=h[e],b=c.get(a),this.releaseTile(b),c["delete"](a);
d.forEach(function(a){return q.tiles.push(a)});l.length=0;h.length=0;d.clear()}};g.prototype._addParentTile=function(a,d){for(var c=a,f=null;c=this.tileInfoView.getTileParentId(c);)if(this.tileIndex.has(c)&&(f=this.tileIndex.get(c))&&f.attached){d.has(f.key.id)||d.set(f.key.id,f);break}};return g}()});