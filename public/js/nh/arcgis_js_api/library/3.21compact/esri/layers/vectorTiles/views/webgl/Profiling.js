// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/views/webgl/Profiling",["require","exports"],function(f,d){Object.defineProperty(d,"__esModule",{value:!0});d.startMeasurement=function(b){if(!b.extensions.disjointTimerQuery)return null;var a=new e;a.start(b);return a};var e=function(){function b(){}b.prototype.start=function(a){this._rctx=a;a=a.extensions.disjointTimerQuery;this._query=a.createQueryEXT();a.beginQueryEXT(a.TIME_ELAPSED_EXT,this._query)};b.prototype.stop=function(a,b){void 0===b&&(b=50);this._cb=a;
this._checkInterval=b;var c=this._rctx.extensions.disjointTimerQuery;c.endQueryEXT(c.TIME_ELAPSED_EXT);this._checkQueryResult()};b.prototype._checkQueryResult=function(){var a=this._rctx.extensions.disjointTimerQuery,b=a.getQueryObjectEXT(this._query,a.QUERY_RESULT_AVAILABLE_EXT),c=this._rctx.gl.getParameter(a.GPU_DISJOINT_EXT);b&&!c?(a=a.getQueryObjectEXT(this._query,a.QUERY_RESULT_EXT),this._cb(a/1E6)):c?this._cb(null):setTimeout(this._checkQueryResult.bind(this),this._checkInterval)};return b}()});