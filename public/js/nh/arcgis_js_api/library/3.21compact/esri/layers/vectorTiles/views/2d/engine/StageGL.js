// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/views/2d/engine/StageGL","require exports ../../../core/tsSupport/extendsHelper ../libs/gl-matrix/common ../libs/gl-matrix/vec2 ../libs/gl-matrix/mat2d ./webgl/BitBlitRenderer ../../support/screenshotUtils ../../../core/promiseUtils ./Container ../../webgl/RenderingContext ../../webgl/FramebufferObject ../../webgl/webgl-utils ../../webgl/Program ../../webgl/VertexArrayObject ../../webgl/BufferObject ./webgl/glShaderSnippets".split(" "),function(N,O,C,D,n,w,E,F,G,H,
I,z,J,K,L,A,B){function x(n){return{budget:n.budget,state:n.state,devicePixelRatio:n.devicePixelRatio,stationary:n.stationary}}var M={png:"image/png",jpg:"image/jpeg",jpeg:"image/jpeg"};return function(v){function c(){var a=null!==v&&v.apply(this,arguments)||this;a._clipData=new Float32Array(8);a._upperLeft=n.create();a._upperRight=n.create();a._lowerLeft=n.create();a._lowerRight=n.create();a._mat2=w.create();a._clipRendererInitialized=!1;return a}C(c,v);c.prototype.createElement=function(){var a=
document.createElement("canvas");a.setAttribute("class","esri-display-object");return a};c.prototype.setElement=function(a){this.element=a};c.prototype.attach=function(a){this._resizeCanvas(a);var d=J.setupWebGL(this.element,{alpha:!0,antialias:!1,depth:!0,stencil:!0});this._renderingContext=new I(d[0]);this.attached=!0;this._cachedRenderParams=x(a);return v.prototype.attach.call(this,a)};c.prototype.detach=function(a){v.prototype.detach.call(this,a);this._renderingContext&&(this._renderingContext.dispose(),
this._renderingContext=null);this._cachedRenderParams=null};c.prototype.beforeRenderChildren=function(a,d){var b=a.state;if(b.spatialReference&&(b.spatialReference._isWrappable?b.spatialReference._isWrappable():b.spatialReference.isWrappable)){var e=b.width,k=b.height,m=b.rotation,g=this._renderingContext,e=Math.round(e*a.devicePixelRatio),k=Math.round(k*a.devicePixelRatio),y=D.toRadian(m),l=Math.abs(Math.cos(y)),c=Math.abs(Math.sin(y)),q=Math.round(b.worldScreenWidth);if(Math.round(e*l+k*c)<=q)this._clipFrame=
!1;else{this._clipFBO&&this._clipFBO.width===e&&this._clipFBO.height===k||(this._clipFBO=new z(g,{colorTarget:0,depthStencilTarget:3,width:e,height:k}));var h=.5*e,t=.5*k,b=1/e,u=1/k,q=.5*q*a.devicePixelRatio,f=.5*(e*c+k*l),e=this._upperLeft,l=this._upperRight,c=this._lowerLeft,p=this._lowerRight;n.set(e,-q,-f);n.set(l,q,-f);n.set(c,-q,f);n.set(p,q,f);w.identity(this._mat2);w.translate(this._mat2,this._mat2,[h,t]);0!==m&&w.rotate(this._mat2,this._mat2,y);n.transformMat2d(e,e,this._mat2);n.transformMat2d(l,
l,this._mat2);n.transformMat2d(c,c,this._mat2);n.transformMat2d(p,p,this._mat2);m=this._clipData;m.set([2*c[0]*b-1,2*(k-c[1])*u-1,2*p[0]*b-1,2*(k-p[1])*u-1,2*e[0]*b-1,2*(k-e[1])*u-1,2*l[0]*b-1,2*(k-l[1])*u-1]);this._clipRendererInitialized||this._initializeClipRenderer(g);this._clipVBO.setData(m);this._boundFBO=g.getBoundFramebufferObject();g.bindFramebuffer(this._clipFBO);g.setDepthWriteEnabled(!0);g.setStencilWriteMask(255);g.setClearColor(0,0,0,0);g.setClearDepth(1);g.setClearStencil(0);g.clear(g.gl.COLOR_BUFFER_BIT|
g.gl.DEPTH_BUFFER_BIT|g.gl.STENCIL_BUFFER_BIT);g.setDepthWriteEnabled(!1);this._clipFrame=!0}}else this._clipFrame=!1};c.prototype.afterRenderChildren=function(a,d){if(this._clipFrame&&this._clipRendererInitialized){var b=this._renderingContext;b.bindFramebuffer(this._boundFBO);this._boundFBO=null;b.bindVAO(this._clipVAO);b.bindProgram(this._clipStencilProgram);b.setDepthWriteEnabled(!1);b.setDepthTestEnabled(!1);b.setStencilTestEnabled(!0);b.setBlendingEnabled(!1);b.setColorMask(!1,!1,!1,!1);b.setStencilOp(7680,
7680,7681);b.setStencilWriteMask(255);b.setStencilFunction(519,1,255);b.drawElements(4,6,5123,0);b.bindVAO();b.setColorMask(!0,!0,!0,!0);b.setBlendingEnabled(!0);b.setStencilFunction(514,1,255);this._blitRenderer.render(b,this._clipFBO.colorTexture,9728,1);b.setStencilTestEnabled(!1)}};c.prototype.doRender=function(a){var d=this.element.style;this.visible?(d.display="block",d.opacity=""+this.opacity,this._resizeCanvas(a),v.prototype.doRender.call(this,a),this._cachedRenderParams=x(a)):d.display="none"};
c.prototype.takeScreenshot=function(a){void 0===a&&(a={});var d=a.pixelRatio||1;this._cachedRenderParams.devicePixelRatio=d;var b=Math.round(d*this._cachedRenderParams.state.width),e=Math.round(d*this._cachedRenderParams.state.height),k=0,m=0,g=b,c=e,l=b,n=e;if(l=a.area)k=Math.round(d*l.x),m=Math.round(d*l.y),g=Math.round(d*l.width),c=Math.round(d*l.height);void 0!==a.width&&void 0!==a.height?(l=a.width/a.height,c*l<g?(l*=c,k+=Math.floor((g-l)/2),g=Math.floor(l)):(l=g/l,m+=Math.floor((c-l)/2),c=Math.floor(l)),
l=a.width,n=a.height):(l=g,n=c);d=document.createElement("canvas");d.width=l;d.height=n;var q=d.getContext("2d"),h=new Uint8Array(g*c*4),t=this._renderingContext,u=z.create(t,{colorTarget:1,depthStencilTarget:3,width:b,height:e});t.bindFramebuffer(u);t.setViewport(0,0,b,e);this._cachedRenderParams.budget&&this._cachedRenderParams.budget.reset(Number.MAX_VALUE);var f=this._cachedRenderParams,p=this._renderingContext.gl;this._renderingContext.setClearColor(0,0,0,0);this._renderingContext.setClearDepth(1);
this._renderingContext.setClearStencil(0);this._renderingContext.clear(p.COLOR_BUFFER_BIT|p.DEPTH_BUFFER_BIT|p.STENCIL_BUFFER_BIT);f.context=this._renderingContext;this.beforeRenderChildren(f,f);if(void 0!==a.rotation&&null!==a.rotation){var p=f.state,r=p.clone();r.viewpoint.rotation=a.rotation;f.state=r;this.renderChildren(f);f.state=p}else this.renderChildren(f);this.afterRenderChildren(f,f);u.readPixels(k,e-(m+c),g,c,6408,5121,h);t.bindFramebuffer();t=q.getImageData(0,0,l,n);if(0!==k||0!==m||g!==
b||c!==e||l!==b||n!==e)F.resampleHermite(h,g,c,t.data,l,n,!0);else{m=c-1;c=0;u=4*g;for(r=p=k=e=b=g=f=void 0;c<m;){p=c*u;r=m*u;for(f=0;f<u;f+=4)g=h[p+f],b=h[p+f+1],e=h[p+f+2],k=h[p+f+3],h[p+f]=h[r+f],h[p+f+1]=h[r+f+1],h[p+f+2]=h[r+f+2],h[p+f+3]=h[r+f+3],h[r+f]=g,h[r+f+1]=b,h[r+f+2]=e,h[r+f+3]=k;c++;m--}g=t.data;b=h.length;for(m=0;m<b;m++)g[m]=h[m]}h=t.data;c=h.length;for(m=0;m<c;m+=4)k=h[m+3],0<k&&(e=k/255,g=Math.floor(h[m+0]/e),b=Math.floor(h[m+1]/e),e=Math.floor(h[m+2]/e),h[m+0]=255>=g?g:255,h[m+
1]=255>=b?b:255,h[m+2]=255>=e?e:255);q.putImageData(t,0,0);q=M[a.format?a.format.toLowerCase():"png"];h=1;void 0!==a.quality&&(h=a.quality/100);a=d.toDataURL(q,h);return G.resolve({dataURL:a,x:0,y:0,width:l,height:n})};c.prototype.prepareChildrenRenderParameters=function(a){if(!this.attached||!this._renderingContext)return null;a=x(a);var d=this._renderingContext,b=d.gl;d.setDepthWriteEnabled(!0);d.setStencilWriteMask(255);d.setClearColor(0,0,0,0);d.setClearDepth(1);d.setClearStencil(0);d.clear(b.COLOR_BUFFER_BIT|
b.DEPTH_BUFFER_BIT|b.STENCIL_BUFFER_BIT);d.setViewport(0,0,this.element.width,this.element.height);d.setDepthWriteEnabled(!1);a.context=d;return a};c.prototype.attachChild=function(a,d){return a.attach(d)};c.prototype.detachChild=function(a,d){return a.detach(d)};c.prototype.renderChild=function(a,d){return a.processRender(d)};c.prototype._resizeCanvas=function(a){var d=this.element,b=d.style,c=a.state,k=a.devicePixelRatio;a=Math.round(c.width*k);k=Math.round(c.height*k);if(d.width!==a||d.height!==
k)d.width=a,d.height=k;b.width=c.width+"px";b.height=c.height+"px"};c.prototype._initializeClipRenderer=function(a){if(this._clipRendererInitialized)return!0;this._blitRenderer=new E;var c={a_pos:0},b=new K(a,B.stencilVS,B.stencilFS,c);if(!b)return!1;var e=A.createVertex(a,35040,32),k=new Uint16Array([0,1,2,2,1,3]),k=A.createIndex(a,35044,k);a=new L(a,c,{geometry:[{name:"a_pos",count:2,type:5126,offset:0,stride:8,normalized:!1,divisor:0}]},{geometry:e},k);this._clipStencilProgram=b;this._clipVBO=
e;this._clipVAO=a;return this._clipRendererInitialized=!0};return c}(H)});