// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/core/urlUtils",["require","exports","esri/urlUtils","dojo/_base/url"],function(h,c,f,k){function l(a){return g(a)||m.test(a)}function g(a){return a&&"/"===a[0]&&"/"===a[1]}function n(a){if("string"===typeof a)return new k(p(a));a.scheme||(a.scheme=c.appUrl.scheme);return a}function p(a,b){void 0===b&&(b=c.appBaseUrl);if(g(a))return"file"===c.appUrl.scheme?"https:"+a:c.appUrl.scheme+":"+a;if(m.test(a))return a;var r=q,d;if("/"===a[0]){d=b;var e=d.indexOf("//"),e=d.indexOf("/",
e+2);d=-1===e?d:d.slice(0,e)}else d=b;return r(d,a)}function q(){for(var a=[],b=0;b<arguments.length;b++)a[b]=arguments[b];if(a&&a.length){b=[];if(l(a[0])){var c=a[0],d=c.indexOf("//");b.push(c.slice(0,d+1));t.test(a[0])&&(b[0]+="/");a[0]=c.slice(d+2)}else"/"===a[0][0]&&b.push("");a=a.reduce(function(a,b){return a.concat(b.split("/"))},[]);for(c=0;c<a.length;c++)d=a[c],".."===d&&0<b.length?b.pop():!d||"."===d&&0!==b.length||b.push(d);return b.join("/")}}Object.defineProperty(c,"__esModule",{value:!0});
c.normalize=function(a){return f.normalize(a)};c.canUseXhr=function(a){return f.canUseXhr(a)};h=Function("return this")();c.appUrl=new k(h.location);c.appBaseUrl=function(){var a=c.appUrl.path,a=a.substring(0,a.lastIndexOf(a.split("/")[a.split("/").length-1]));return""+(c.appUrl.scheme+"://"+c.appUrl.host+(null!=c.appUrl.port?":"+c.appUrl.port:""))+a}();var t=/^\s*file:/i,m=/^\s*[a-z][a-z0-9-+.]*:[^0-9]/i;c.isAbsolute=l;c.urlToObject=function(a){return f.urlToObject(a)};c.getOrigin=function(a){if("data:"===
a.slice(0,5))return null;var b=a.indexOf("://");if(-1===b&&g(a))b=2;else if(-1!==b)b+=3;else return null;b=a.indexOf("/",b);return-1===b?a:a.slice(0,b)};c.makeAbsolute=p;c.hasSameOrigin=function(a,b,c){void 0===c&&(c=!1);a=n(a);b=n(b);return c||a.scheme===b.scheme?a.host.toLowerCase()===b.host.toLowerCase()&&a.port===b.port:!1};c.join=q});