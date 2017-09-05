// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/map","require dojo/_base/kernel dojo/_base/declare dojo/_base/connect dojo/_base/lang dojo/_base/array dojo/_base/event dojo/on dojo/aspect dojo/dom dojo/dom-attr dojo/dom-class dojo/dom-construct dojo/dom-geometry dojo/dom-style dijit/a11yclick dijit/registry ./kernel ./config ./sniff ./lang ./_coremap ./MapNavigationManager dojo/i18n!./nls/jsapi".split(" "),function(x,r,L,A,h,n,B,C,M,D,E,e,t,N,O,u,P,v,Q,g,q,R,S,F){var y={up:"panUp",right:"panRight",down:"panDown",left:"panLeft"},G=
{upperRight:"panUpperRight",lowerRight:"panLowerRight",lowerLeft:"panLowerLeft",upperLeft:"panUpperLeft"},k=A.connect,H=A.disconnect,l=t.create,m=O.set,I=h.hitch,w=N.getMarginBox,J=r.deprecated,z=h.mixin,K=0;r=L(R,{declaredClass:"esri.Map",constructor:function(a,b){b=b||{};z(this,{_slider:null,_navDiv:null,_mapParams:z({attributionWidth:.45,slider:!0,nav:!1,logo:!0,sliderStyle:"small",sliderPosition:"top-left",sliderOrientation:"vertical",autoResize:!0},b)});z(this,{isMapNavigation:null!=b.isMapNavigation?
b.isMapNavigation:!0,isDoubleClickZoom:null!=b.isDoubleClickZoom?b.isDoubleClickZoom:!0,isClickRecenter:null!=b.isClickRecenter?b.isClickRecenter:!0,isPan:null!=b.isPan?b.isPan:!0,isRubberBandZoom:null!=b.isRubberBandZoom?b.isRubberBandZoom:!0,isPinchZoom:null!=b.isPinchZoom?b.isPinchZoom:!0,isKeyboardNavigation:null!=b.isKeyboardNavigation?b.isKeyboardNavigation:!0,isScrollWheel:null!=b.isScrollWheel?b.isScrollWheel:!0,isShiftDoubleClickZoom:!1,isScrollWheelZoom:!1,isPanArrows:!1,isZoomSlider:!1});
h.isFunction(v._css)&&(v._css=v._css(this._mapParams.force3DTransforms),this.force3DTransforms=this._mapParams.force3DTransforms);var c=g("esri-transforms")&&g("esri-transitions");this.navigationMode=this._mapParams.navigationMode||c&&"css-transforms"||"classic";"css-transforms"!==this.navigationMode||c||(this.navigationMode="classic");this.fadeOnZoom=q.isDefined(this._mapParams.fadeOnZoom)?this._mapParams.fadeOnZoom:"css-transforms"===this.navigationMode;"css-transforms"!==this.navigationMode&&(this.fadeOnZoom=
!1);this.setMapCursor("default");this.smartNavigation=b&&b.smartNavigation;if(!(q.isDefined(this.smartNavigation)||!g("mac")||g("esri-touch")||g("esri-pointer")||3.5>=g("ff"))){var d=navigator.userAgent.match(/Mac\s+OS\s+X\s+([\d]+)(\.|\_)([\d]+)\D/i);d&&q.isDefined(d[1])&&q.isDefined(d[3])&&(c=parseInt(d[1],10),d=parseInt(d[3],10),this.smartNavigation=10<c||10===c&&6<=d)}c=!0;c=!1;this.showAttribution=q.isDefined(this._mapParams.showAttribution)?this._mapParams.showAttribution:c;this._onLoadHandler_connect=
k(this,"onLoad",this,"_onLoadInitNavsHandler");var f=l("div",{"class":"esriControlsBR"+(this._mapParams.nav?" withPanArrows":"")},this.root);if(this.showAttribution)if(c=h.getObject("esri.dijit.Attribution",!1))this._initAttribution(c,f);else{var e=K++,p=this;this._rids&&this._rids.push(e);x(["./dijit/Attribution"],function(a){var b=p._rids?n.indexOf(p._rids,e):-1;-1!==b&&(p._rids.splice(b,1),p._initAttribution(a,f))})}this._mapParams.logo&&(c={},6===g("ie")&&(c.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled\x3d'true', sizingMethod\x3d'crop', src\x3d'"+
x.toUrl("./images/map/logo-med.png")+"')"),this._ogol=l("div",{style:c,tabIndex:"0",title:"Esri"},f),this._setLogoSize(),this._onMapResizeLogo_connect=k(this,"onResize",this,"_setLogoSize"),this._ogol_connect=k(this._ogol,u,this,"_openLogoLink"));this.navigationManager=new S(this);b&&b.basemap&&(this._onLoadFix=!0,this.setBasemap(b.basemap),this._onLoadFix=!1);if(this.autoResize=this._mapParams.autoResize)c=this._getEnclosingResizableWidget(this.container)||window,d=this.resize,this._rszSignal=C.pausable(c,
"resize",d),this._oriSignal=C.pausable(window,"orientationchange",d),M.after(c,"resize",d,!0),this._startResizeTimer()},_startResizeTimer:function(){clearTimeout(this._persistentTimer);this._persistentTimer=setTimeout(this._timedResize,2*this.resizeDelay)},_getEnclosingResizableWidget:function(a){var b=P.getEnclosingWidget(a);return b?b.resize?b:this._getEnclosingResizableWidget(a.parentNode):b},_setLogoSize:function(){this._ogol&&(25E4>this.root.clientWidth*this.root.clientHeight?(e.remove(this._ogol,
"logo-med"),e.add(this._ogol,"logo-sm")):(e.remove(this._ogol,"logo-sm"),e.add(this._ogol,"logo-med")))},_initAttribution:function(a,b){var c=l("span",{"class":"esriAttribution"},b,"first");m(c,"maxWidth",Math.floor(this.width*this._mapParams.attributionWidth)+"px");this._connects.push(k(c,u,function(){e.contains(this,"esriAttributionOpen")?e.remove(this,"esriAttributionOpen"):this.scrollWidth>this.clientWidth&&e.add(this,"esriAttributionOpen")}));this.attribution=new a({map:this},c)},_cleanUp:function(){this.disableMapNavigation();
this.navigationManager.destroy();var a=this._slider;a&&a.destroy&&!a._destroyed&&a.destroy();var a=this._navDiv,b=this.attribution;a&&t.destroy(a);b&&b.destroy();this._connects.push(this._slider_connect,this._ogol_connect,this._rszSignal,this._oriSignal);n.forEach(this._connects,H);clearInterval(this._persistentTimer);this.attribution=this.navigationManager=this._rids=this._connects=this._slider_connect=this._ogol_connect=this._rszSignal=this._oriSignal=this._persistentTimer=null;this.inherited("_cleanUp",
arguments)},_isPanningOrZooming:function(){return this.__panning||this.__zooming},_canZoom:function(a){var b=this.getLevel();return!this.__tileInfo||!(b===this.getMinZoom()&&0>a||b===this.getMaxZoom()&&0<a)},_onLoadInitNavsHandler:function(){this._evalMapNavigation();this._createNav();if("small"===this._mapParams.sliderStyle||!this._createSlider)this._createSimpleSlider();else if(this._mapParams.slider){var a=-1!==this._getSliderClass(!0).indexOf("Horizontal"),a=[a?"dijit.form.HorizontalSlider":"dijit.form.VerticalSlider",
a?"dijit.form.HorizontalRule":"dijit.form.VerticalRule",a?"dijit.form.HorizontalRuleLabels":"dijit.form.VerticalRuleLabels"];if(n.some(a,function(a){return!h.getObject(a,!1)})){var a=n.map(a,function(a){return a.replace(/\./g,"/")}),b=K++,c=this;this._rids&&this._rids.push(b);x(a,function(){var a=c._rids?n.indexOf(c._rids,b):-1;-1!==a&&(c._rids.splice(a,1),c._createSlider.apply(c,arguments))})}else a=n.map(a,function(a){return h.getObject(a,!1)}),this._createSlider.apply(this,a)}H(this._onLoadHandler_connect)},
_createNav:function(){if(this._mapParams.nav){var a,b,c,d=e.add,f=this.id;this._navDiv=l("div",{id:f+"_navdiv"},this.root);d(this._navDiv,"navDiv");var g=this.width/2,p=this.height/2,h;for(c in y)b=y[c],a=l("div",{id:f+"_pan_"+c},this._navDiv),d(a,"fixedPan "+b),"up"===c||"down"===c?(h=parseInt(w(a).w,10)/2,m(a,{left:g-h+"px",zIndex:30})):(h=parseInt(w(a).h,10)/2,m(a,{top:p-h+"px",zIndex:30})),this._connects.push(k(a,"onclick",I(this,this[b])));this._onMapResizeNavHandler_connect=k(this,"onResize",
this,"_onMapResizeNavHandler");for(c in G)b=G[c],a=l("div",{id:f+"_pan_"+c,style:{zIndex:30}},this._navDiv),d(a,"fixedPan "+b),this._connects.push(k(a,"onclick",I(this,this[b])));this.isPanArrows=!0}},_onMapResizeNavHandler:function(a,b,c){a=this.id;b/=2;c/=2;var d=D.byId,f,e,g;for(f in y)e=d(a+"_pan_"+f),"up"===f||"down"===f?(g=parseInt(w(e).w,10)/2,m(e,"left",b-g+"px")):(g=parseInt(w(e).h,10)/2,m(e,"top",c-g+"px"))},_createSimpleSlider:function(){if(this._mapParams.slider){var a=this._slider=l("div",
{id:this.id+"_zoom_slider","class":this._getSliderClass(),style:{zIndex:30}}),b=l("div",{"class":"esriSimpleSliderIncrementButton",tabIndex:"0",role:"button"},a),c=l("div",{"class":"esriSimpleSliderDecrementButton",tabIndex:"0",role:"button"},a);this._addZoomButtonTooltips(b,c);this._incButton=b;this._decButton=c;this._simpleSliderZoomHandler(null,null,null,this.getLevel());var d=F.widgets.zoomSlider;this._addZoomButtonIcon(b,"+",d.zoomIn);this._addZoomButtonIcon(c,"\x26minus;",d.zoomOut);8>g("ie")&&
e.add(c,"dj_ie67Fix");this._connects.push(k(b,u,this,this._simpleSliderChangeHandler));this._connects.push(k(c,u,this,this._simpleSliderChangeHandler));(-1<this.getMaxZoom()||-1<this.getMinZoom())&&this._connects.push(k(this,"onZoomEnd",this,this._simpleSliderZoomHandler));10>g("ie")&&D.setSelectable(a,!1);this.root.appendChild(a);this.isZoomSlider=!0}},_simpleSliderChangeHandler:function(a){B.stop(a);a=-1!==a.currentTarget.className.indexOf("IncrementButton")?!0:!1;this._extentUtil({numLevels:a?
1:-1})},_simpleSliderZoomHandler:function(a,b,c,d){var f;a=this._incButton;b=this._decButton;-1<d&&d===this.getMaxZoom()?f=a:-1<d&&d===this.getMinZoom()&&(f=b);f?(e.add(f,"esriSimpleSliderDisabledButton"),e.remove(f===a?b:a,"esriSimpleSliderDisabledButton")):(e.remove(a,"esriSimpleSliderDisabledButton"),e.remove(b,"esriSimpleSliderDisabledButton"))},_getSliderClass:function(a){a=a?"Large":"Simple";var b=this._mapParams.sliderOrientation,c=this._mapParams.sliderPosition||"",b=b&&"horizontal"===b.toLowerCase()?
"esri"+a+"SliderHorizontal":"esri"+a+"SliderVertical";if(c)switch(c.toLowerCase()){case "top-left":c="esri"+a+"SliderTL";break;case "top-right":c="esri"+a+"SliderTR";break;case "bottom-left":c="esri"+a+"SliderBL";break;case "bottom-right":c="esri"+a+"SliderBR"}return"esri"+a+"Slider "+b+" "+c},_addZoomButtonIcon:function(a,b,c){t.create("span",{"aria-hidden":"true",role:"presentation",innerHTML:b},a);t.create("span",{"class":"esriIconFallbackText",innerHTML:c},a)},_addZoomButtonTooltips:function(a,
b){var c=F.widgets.zoomSlider;E.set(a,"title",c.zoomIn);E.set(b,"title",c.zoomOut)},_openLogoLink:function(a){window.open(Q.defaults.map.logoLink,"_blank");B.stop(a)},enableMapNavigation:function(){this.isMapNavigation||(this.isMapNavigation=!0,this._evalMapNavigation())},disableMapNavigation:function(){this.isMapNavigation&&(this.isMapNavigation=!1,this._evalMapNavigation())},_evalMapNavigation:function(){this.isMapNavigation?this.navigationManager.enableNavigation():this.navigationManager.disableNavigation()},
_evalNavigationFeature:function(a){if(this.isMapNavigation&&this["is"+a])this.navigationManager["enable"+a]();else this.navigationManager["disable"+a]()},enableDoubleClickZoom:function(){this.isDoubleClickZoom||(this.isDoubleClickZoom=!0,this._evalNavigationFeature("DoubleClickZoom"))},disableDoubleClickZoom:function(){this.isDoubleClickZoom&&(this.isDoubleClickZoom=!1,this._evalNavigationFeature("DoubleClickZoom"))},enableShiftDoubleClickZoom:function(){this.isShiftDoubleClickZoom||(J(this.declaredClass+
": Map.(enable/disable)ShiftDoubleClickZoom deprecated. Shift-Double-Click zoom behavior will not be supported.",null,"v2.0"),this.navigationManager.enableShiftDoubleClickZoom(),this.isShiftDoubleClickZoom=!0)},disableShiftDoubleClickZoom:function(){this.isShiftDoubleClickZoom&&(J(this.declaredClass+": Map.(enable/disable)ShiftDoubleClickZoom deprecated. Shift-Double-Click zoom behavior will not be supported.",null,"v2.0"),this.navigationManager.disableShiftDoubleClickZoom(),this.isShiftDoubleClickZoom=
!1)},enableClickRecenter:function(){this.isClickRecenter||(this.isClickRecenter=!0,this._evalNavigationFeature("ClickRecenter"))},disableClickRecenter:function(){this.isClickRecenter&&(this.isClickRecenter=!1,this._evalNavigationFeature("ClickRecenter"))},enablePan:function(){this.isPan||(this.isPan=!0,this._evalNavigationFeature("Pan"))},disablePan:function(){this.isPan&&(this.isPan=!1,this._evalNavigationFeature("Pan"))},enableRubberBandZoom:function(){this.isRubberBandZoom||(this.isRubberBandZoom=
!0,this._evalNavigationFeature("RubberBandZoom"))},disableRubberBandZoom:function(){this.isRubberBandZoom&&(this.isRubberBandZoom=!1,this._evalNavigationFeature("RubberBandZoom"))},enablePinchZoom:function(){this.isPinchZoom||(this.isPinchZoom=!0,this._evalNavigationFeature("PinchZoom"))},disablePinchZoom:function(){this.isPinchZoom&&(this.isPinchZoom=!1,this._evalNavigationFeature("PinchZoom"))},enableKeyboardNavigation:function(){this.isKeyboardNavigation||(this.isKeyboardNavigation=!0,this._evalNavigationFeature("KeyboardNavigation"))},
disableKeyboardNavigation:function(){this.isKeyboardNavigation&&(this.isKeyboardNavigation=!1,this._evalNavigationFeature("KeyboardNavigation"))},enableScrollWheel:function(){this.isScrollWheel||(this.isScrollWheel=!0,this._evalNavigationFeature("ScrollWheel"))},disableScrollWheel:function(){this.isScrollWheel&&(this.isScrollWheel=!1,this._evalNavigationFeature("ScrollWheel"))},enableScrollWheelZoom:function(){this.isScrollWheelZoom||(this.navigationManager.enableScrollWheelZoom(),this.isScrollWheelZoom=
!0)},disableScrollWheelZoom:function(){this.isScrollWheelZoom&&(this.navigationManager.disableScrollWheelZoom(),this.isScrollWheelZoom=!1)},enableScrollWheelPan:function(){this.isScrollWheelPan||this.navigationManager.enableScrollWheelPan()},disableScrollWheelPan:function(){this.isScrollWheelPan&&this.navigationManager.disableScrollWheelPan()},showPanArrows:function(){this._navDiv&&(this._navDiv.style.display="block",this.isPanArrows=!0)},hidePanArrows:function(){this._navDiv&&(this._navDiv.style.display=
"none",this.isPanArrows=!1)},showZoomSlider:function(){this._slider&&(m(this._slider.domNode||this._slider,"visibility","inherit"),this.isZoomSlider=!0)},hideZoomSlider:function(){this._slider&&(m(this._slider.domNode||this._slider,"visibility","hidden"),this.isZoomSlider=!1)}});g("extend-esri")&&(v.Map=r);return r});