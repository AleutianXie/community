// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/views/support/screenshotUtils",["require","exports","dojo/_base/lang"],function(E,g,u){Object.defineProperty(g,"__esModule",{value:!0});g.adjustScreenshotSettings=function(a,c){a=u.mixin({format:"png",quality:100},a||{});var d,e;a.includePadding?(d=c.width,e=c.height):(d=c.width-c.padding.left-c.padding.right,e=c.height-c.padding.top-c.padding.bottom);var k=d/e;void 0!==a.width&&void 0===a.height?a.height=a.width/k:void 0!==a.height&&void 0===a.width&&(a.width=k*a.height);
void 0!==a.height&&(a.height=Math.floor(a.height));void 0!==a.width&&(a.width=Math.floor(a.width));a.area||a.includePadding||(a.area={x:c.padding.left,y:c.padding.top,width:d,height:e});return a};g.resampleHermite=function(a,c,d,e,k,g,v){void 0===v&&(v=!0);var m=c/k;d/=g;for(var u=Math.ceil(m/2),B=Math.ceil(d/2),h=0;h<g;h++)for(var l=0;l<k;l++){for(var n=4*(l+(v?g-h-1:h)*k),b=0,p=0,w=0,x=0,y=0,z=0,A=0,C=(h+.5)*d,q=Math.floor(h*d);q<(h+1)*d;q++)for(var r=Math.abs(C-(q+.5))/B,D=(l+.5)*m,r=r*r,t=Math.floor(l*
m);t<(l+1)*m;t++){var f=Math.abs(D-(t+.5))/u,b=Math.sqrt(r+f*f);-1<=b&&1>=b&&(b=2*b*b*b-3*b*b+1,0<b&&(f=4*(t+q*c),A+=b*a[f+3],w+=b,255>a[f+3]&&(b=b*a[f+3]/250),x+=b*a[f],y+=b*a[f+1],z+=b*a[f+2],p+=b))}e[n]=x/p;e[n+1]=y/p;e[n+2]=z/p;e[n+3]=A/w}}});