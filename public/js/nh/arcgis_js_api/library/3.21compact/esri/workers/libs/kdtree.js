// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
/*
 MIT License <http://www.opensource.org/licenses/mit-license.php>
*/
(function(){function q(b,h,g){this.obj=b;this.right=this.left=null;this.parent=g;this.dimension=h}function t(b,h,g){function l(a,c,f){var b=c%g.length,d;if(0===a.length)return null;if(1===a.length)return new q(a[0],b,f);a.sort(function(a,f){return a[g[b]]-f[g[b]]});d=Math.floor(a.length/2);f=new q(a[d],b,f);f.left=l(a.slice(0,d),c+1,f);f.right=l(a.slice(d+1),c+1,f);return f}function p(a){function c(a){a.left&&(a.left.parent=a,c(a.left));a.right&&(a.right.parent=a,c(a.right))}m.root=a;c(m.root)}var m=
this;Array.isArray(b)?this.root=l(b,0,null):p(b,h,g);this.toJSON=function(a){a||(a=this.root);var c=new q(a.obj,a.dimension,null);a.left&&(c.left=m.toJSON(a.left));a.right&&(c.right=m.toJSON(a.right));return c};this.insert=function(a){function c(d,b){if(null===d)return b;var e=g[d.dimension];return a[e]<d.obj[e]?c(d.left,d):c(d.right,d)}var f=c(this.root,null),b,d;null===f?this.root=new q(a,0,null):(b=new q(a,(f.dimension+1)%g.length,f),d=g[f.dimension],a[d]<f.obj[d]?f.left=b:f.right=b)};this.remove=
function(a){function b(d){if(null===d)return null;if(d.obj===a)return d;var f=g[d.dimension];return a[f]<d.obj[f]?b(d.left,d):b(d.right,d)}function f(a){function b(a,f){var e,c,d,h,k;if(null===a)return null;e=g[f];if(a.dimension===f)return null!==a.right?b(a.right,f):a;c=a.obj[e];d=b(a.left,f);h=b(a.right,f);k=a;null!==d&&d.obj[e]>c&&(k=d);null!==h&&h.obj[e]>k.obj[e]&&(k=h);return k}function c(a,b){var f,e,d,h,k;if(null===a)return null;f=g[b];if(a.dimension===b)return null!==a.left?c(a.left,b):a;
e=a.obj[f];d=c(a.left,b);h=c(a.right,b);k=a;null!==d&&d.obj[f]<e&&(k=d);null!==h&&h.obj[f]<k.obj[f]&&(k=h);return k}var e,d;null===a.left&&null===a.right?null===a.parent?m.root=null:(e=g[a.parent.dimension],a.obj[e]<a.parent.obj[e]?a.parent.left=null:a.parent.right=null):(e=null!==a.left?b(a.left,a.dimension):c(a.right,a.dimension),d=e.obj,f(e),a.obj=d)}var h;h=b(m.root);null!==h&&f(h)};this.nearest=function(a,b,f,l){function d(e){var c;c=g[e.dimension];var l=h(a,e.obj),m={},n;for(n=0;n<g.length;n+=
1)m[g[n]]=n===e.dimension?a[g[n]]:e.obj[g[n]];m=h(m,e.obj);if(null===e.right&&null===e.left){if(k.size()<b||l<k.peek()[1])if(!f||f(e.obj))k.push([e,l]),k.size()>b&&k.pop()}else{c=null===e.right?e.left:null===e.left?e.right:a[c]<e.obj[c]?e.left:e.right;d(c);if(k.size()<b||l<k.peek()[1])if(!f||f(e.obj))k.push([e,l]),k.size()>b&&k.pop();if(k.size()<b||Math.abs(m)<k.peek()[1])e=c===e.left?e.right:e.left,null!==e&&d(e)}}var c,k;k=new r(function(a){return-a[1]});if(l)for(c=0;c<b;c+=1)k.push([null,l]);d(m.root);
l=[];for(c=0;c<b&&c<k.content.length;c+=1)k.content[c][0]&&l.push([k.content[c][0].obj,k.content[c][1]]);return l};this.balanceFactor=function(){function a(b){return null===b?0:Math.max(a(b.left),a(b.right))+1}function b(a){return null===a?0:b(a.left)+b(a.right)+1}return a(m.root)/(Math.log(b(m.root))/Math.log(2))}}function r(b){this.content=[];this.scoreFunction=b}r.prototype={push:function(b){this.content.push(b);this.bubbleUp(this.content.length-1)},pop:function(){var b=this.content[0],h=this.content.pop();
0<this.content.length&&(this.content[0]=h,this.sinkDown(0));return b},peek:function(){return this.content[0]},remove:function(b){for(var h=this.content.length,g=0;g<h;g++)if(this.content[g]==b){var l=this.content.pop();g!=h-1&&(this.content[g]=l,this.scoreFunction(l)<this.scoreFunction(b)?this.bubbleUp(g):this.sinkDown(g));return}throw Error("Node not found.");},size:function(){return this.content.length},bubbleUp:function(b){for(var h=this.content[b];0<b;){var g=Math.floor((b+1)/2)-1,l=this.content[g];
if(this.scoreFunction(h)<this.scoreFunction(l))this.content[g]=h,this.content[b]=l,b=g;else break}},sinkDown:function(b){for(var h=this.content.length,g=this.content[b],l=this.scoreFunction(g);;){var p=2*(b+1),m=p-1,a=null;if(m<h){var c=this.scoreFunction(this.content[m]);c<l&&(a=m)}p<h&&this.scoreFunction(this.content[p])<(null==a?l:c)&&(a=p);if(null!=a)this.content[b]=this.content[a],this.content[a]=g,b=a;else break}}};this.kdTree=t;"undefined"!==typeof exports&&(exports.kdTree=t,exports.BinaryHeap=
r)})();