// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/sniff",["dojo/_base/sniff","./kernel"],function(a,c){var f=function(){return this}(),d=a("ff"),g=a("ie"),n=void 0===g&&7<=a("trident"),p=a("edge"),l=a("webkit"),h=a("opera"),m=a("chrome"),q=a("safari"),k=navigator.userAgent,e;(e=k.match(/(iPhone|iPad|CPU)\s+OS\s+(\d+\_\d+)/i))&&a.add("esri-iphone",parseFloat(e[2].replace("_",".")));(e=k.match(/Android\s+(\d+\.\d+)/i))&&a.add("esri-android",parseFloat(e[1]));(e=k.match(/Fennec\/(\d+\.\d+)/i))&&a.add("esri-fennec",parseFloat(e[1]));0<=
k.indexOf("BlackBerry")&&0<=k.indexOf("WebKit")&&a.add("esri-blackberry",1);a.add("esri-touch",a("esri-iphone")||a("esri-android")||a("esri-blackberry")||6<=a("esri-fennec")||(d||l)&&document.createTouch?!0:!1);(e=k.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|Opera Mini|IEMobile/i))&&a.add("esri-mobile",e);a.add("esri-pointer",navigator.pointerEnabled||navigator.msPointerEnabled);c._getDOMAccessor=function(a){var b="";d?b="Moz":l?b="Webkit":g?b="ms":h&&(b="O");return b+a.charAt(0).toUpperCase()+
a.substr(1)};a.add("esri-phonegap",!!f.cordova);a.add("esri-cors",a("esri-phonegap")||f.XMLHttpRequest&&"withCredentials"in new XMLHttpRequest);a.add("esri-file-upload",f.FormData&&f.FileList?!0:!1);a.add("esri-workers",f.Worker?!0:!1);a.add("esri-transforms",n||p||9<=g||3.5<=d||4<=m||3.1<=q||10.5<=h||3.2<=a("esri-iphone")||2.1<=a("esri-android"));a.add("esri-transitions",n||p||10<=g||4<=d||4<=m||3.1<=q||10.5<=h||3.2<=a("esri-iphone")||2.1<=a("esri-android"));a.add("esri-transforms3d",n||p||10<=d||
12<=m||4<=q||3.2<=a("esri-iphone")||3<=a("esri-android"));a.add("esri-url-encodes-apostrophe",function(){if(f.document)return!1;var a=f.document.createElement("a");a.href="?'";return-1<a.href.indexOf("?%27")});3>a("esri-android")&&(a.add("esri-transforms",!1,!1,!0),a.add("esri-transitions",!1,!1,!0),a.add("esri-transforms3d",!1,!1,!0));a.add("esri-will-change",a("esri-transforms")&&(52<=m||9.1<=q));c._css=function(c){var b=a("esri-transforms3d");void 0!==c&&null!==c?b=c:b&&(m||q&&!a("esri-iphone"))&&
(b=!1);var e=b?"translate3d(":"translate(",f=b?m?",-1px)":",0px)":")",k=b?"scale3d(":"scale(",n=b?",1)":")",p=b?"rotate3d(0,0,1,":"rotate(",r=b?"matrix3d(":"matrix(",t=b?",0,0,":",",u=b?",0,0,0,0,1,0,":",",v=b?",0,1)":")";return{names:{transition:l&&"-webkit-transition"||d&&"MozTransition"||h&&"OTransition"||g&&"msTransition"||"transition",transform:l&&"-webkit-transform"||d&&"MozTransform"||h&&"OTransform"||g&&"msTransform"||"transform",transformName:l&&"-webkit-transform"||d&&"-moz-transform"||
h&&"-o-transform"||g&&"-ms-transform"||"transform",origin:l&&"-webkit-transform-origin"||d&&"MozTransformOrigin"||h&&"OTransformOrigin"||g&&"msTransformOrigin"||"transformOrigin",endEvent:l&&"webkitTransitionEnd"||d&&"transitionend"||h&&"oTransitionEnd"||g&&"MSTransitionEnd"||"transitionend"},translate:function(a,b){return e+a+"px,"+b+"px"+f},scale:function(a){return k+a+","+a+n},rotate:function(a){return p+a+"deg)"},matrix:function(a){return r+a.xx+","+a.xy+t+a.yx+","+a.yy+u+a.dx.toFixed(10)+(d?
"px,":",")+a.dy.toFixed(10)+(d?"px":"")+v},getScaleFromMatrix:function(a){if(!a)return 1;a=a.toLowerCase();var b=-1<a.indexOf("matrix3d")?"matrix3d(":"matrix(";return Number(a.substring(b.length,a.indexOf(",")))}}};a("extend-esri")&&(c.isiPhone=a("esri-iphone"),c.isAndroid=a("esri-android"),c.isFennec=a("esri-fennec"),c.isBlackBerry=a("esri-blackberry"),c.isTouchEnabled=a("esri-touch"),c.isPointerEnabled=a("esri-pointer"),c._hasCors=a("esri-cors"),c._hasFileUpload=a("esri-file-upload"),c._hasTransforms=
a("esri-transforms"),c._hasTransitions=a("esri-transitions"),c._has3DTransforms=a("esri-transforms3d"));return a});