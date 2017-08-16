// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/dijit/analysis/HelpWindow","require dojo/_base/array dojo/_base/declare dojo/_base/lang dojo/_base/connect dojo/_base/event dojo/_base/kernel dojo/aspect dojo/has dojo/dom-construct dojo/dom-class dojo/dom-attr dojo/dom-style dojo/query dojo/window dojo/dom-geometry dijit/_Widget dijit/TooltipDialog dijit/popup ../../kernel ../../lang ../../urlUtils ../../request ../_EventedWidget dojo/i18n!../../nls/jsapi".split(" "),function(n,p,l,h,E,F,f,u,q,G,H,I,v,w,x,y,z,A,m,B,r,C,D,J,t){l=l([z],
{declaredClass:"esri.dijit.analysis.HelpWindow",i18n:null,onlineHelpMap:null,showLearnMore:!1,"class":"esriAnalyisHelpWindow",constructor:function(b){this.isPortal=b&&b.isPortal},postMixInProperties:function(){this.inherited(arguments);this.i18n={};h.mixin(this.i18n,t.common);h.mixin(this.i18n,t.analysisHelp)},postCreate:function(){this.inherited(arguments);var b=["ar","he"],a,d;this.onlineHelpMap={};for(a=0;a<b.length;a+=1)d=b[a],f.locale&&-1!==f.locale.indexOf(d)&&(-1!==f.locale.indexOf("-")?-1!==
f.locale.indexOf(d+"-")&&(this._isRightToLeft=!0):this._isRightToLeft=!0);b=n.toUrl(this.isPortal?"./help/helpmap_enterprise.json":"./help/helpmap.json");D({url:b}).then(h.hitch(this,function(a){this.onlineHelpMap=a.map}))},_getAbsoluteUrl:function(b){var a=C.getProtocolForWebResource();if(/^https?\:/i.test(b))return b;if(/^\/\//i.test(b))return a+b;if(/^\//i.test(b))return a+"//"+window.location.host+b},_computeSize:function(b){var a={w:400,h:200};q("esri-mobile")?a={w:"50%",h:"90%"}:-1!==b.indexOf("Category")?
(a.w=400,a.h=320):-1!==b.indexOf("Tool")?(a.w=400,a.h=320):-1!==b.indexOf("toolDescription")&&(a.w=400,a.h=520);return a},_setHelpTopicAttr:function(b){this.tooltipHelpDlg&&(m.close(this.tooltipHelpDlg),this.tooltipHelpDlg.destroy(),this.tooltipHelpDlg=null);var a,d,e,g,k="",c;this.showLearnMore=!1;d=this._analysisGpServer&&-1!==this._analysisGpServer.indexOf("dev")?"dev":this._analysisGpServer&&-1!==this._analysisGpServer.indexOf("qa")?"uat":"";k=this.isPortal?"-PortalOnly":"-OnlineOnly";a=h.clone(f.locale);
"nb"===a&&(a="no");e=n.toUrl("esri/dijit/analysis/help/"+this.helpFileName+".html");c=this.helpFileName;r.isDefined(this.onlineHelpMap[c])&&r.isDefined(this.onlineHelpMap[c][b])&&(this.showLearnMore=!0,g="http://doc"+d+".arcgis.com/en/arcgis-online/analyze/"+this.onlineHelpMap[c][b],this.isPortal&&this.helpBase?g=this.helpBase+"index.html#"+this.onlineHelpMap[c][b]:this.isPortal&&!this.helpBase&&(g="http://server"+d+".arcgis.com/en/portal/latest/use/"+this.onlineHelpMap[c][b]));-1!==p.indexOf("ar bs cs da de es el et fi fr hi hr id it ja ko lt lv ru nl no pl pt-br pt-pt ro sv sr th tr vi zh-cn zh-hk zh-tw".split(" "),
a)&&(-1!==a.indexOf("-")&&(e=a.split("-"),a=e[0]+"-"+e[1].toUpperCase()),e=n.toUrl("esri/dijit/analysis/help/"+a+"/"+this.helpFileName+".html"));-1!==p.indexOf("ar de es fr it ja ko ru pl pt-br ro zh-cn zh-hk zh-tw".split(" "),a)&&this.showLearnMore&&(g="http://doc"+d+".arcgis.com/"+a+"/arcgis-online/analyze/"+this.onlineHelpMap[c][b],this.isPortal&&this.helpBase?g=this.helpBase+"index.html#"+this.onlineHelpMap[c][b]:this.isPortal&&!this.helpBase&&(g="http://server"+d+".arcgis.com/"+a+"/portal/latest/use/"+
this.onlineHelpMap[c][b]));this._size=d=this._computeSize(b);this.tooltipHelpDlg=new A({preload:!0,content:"\x3cdiv class\x3d'' style\x3d'position:relative'\x3cdiv class\x3d'sizer content'\x3e\x3cdiv class\x3d'contentPane'\x3e\x3cdiv class\x3d'esriFloatTrailing' style\x3d'padding:0;'\x3e\x3ca href\x3d'#' class\x3d'esriAnalysisCloseIcon' title\x3d'"+this.i18n.close+"'\x3e\x3c/a\x3e\x3c/div\x3e\x3ciframe frameborder\x3d'0'  id\x3d'"+b+"' src\x3d'"+e+"#"+b+k+"' width\x3d'"+d.w+"' height\x3d'"+d.h+"' marginheight\x3d'0' marginwidth\x3d'0'\x3e\x3c/iframe\x3e\x3c/div\x3e\x3c/div\x3e\x3cdiv class\x3d'sizer'\x3e\x3cdiv class\x3d'actionsPane'\x3e\x3cdiv class\x3d'actionList"+
(this.showLearnMore?"'\x3e":" hidden'\x3e")+"\x3ca class\x3d'action zoomTo' href\x3d'"+(this.showLearnMore?g:"#")+"' target\x3d'_help'\x3e"+this.i18n.learnMore+"\x3c/a\x3e\x3c/div\x3e\x3c/div\x3e\x3c/div\x3e\x3c/div\x3e\x3c/div\x3e","class":"esriHelpPopup esriHelpPopupWrapper esriAnalyisHelpWindow"});this.tooltipHelpDlg.startup()},show:function(b,a){this.helpFileName=a.helpFileName;this._analysisGpServer=a.analysisGpServer;this.isPortal=a.isPortal;this.helpBase=a.helpBase;a.analysisMode&&(this.analysisMode=
a.analysisMode);this.set("helpTopic",a.helpId);var d=u.after(m,"open",h.hitch(this,function(){w(".esriAnalysisCloseIcon",this.tooltipHelpDlg.domNode).on("click",h.hitch(this,this.close));d.remove()})),e=b.pageX,g=x.getBox(),k,c,f;f=!1;a.helpParentNode&&(k=a.helpParentNode);k&&(c=y.position(k));c&&g.w-b.pageX<c.w?(f=!0,e=c.x-this._size.w-10,this._isRightToLeft&&(e-=10)):this._isRightToLeft&&e-40<this._size.w&&(e=c.w+this._size.w+80);m.open({popup:this.tooltipHelpDlg,x:!0===this._isRightToLeft||f?e-
40:e+40,y:b.screenY-b.pageY+10,onCancel:h.hitch(this,function(){this.close()}),onExecute:function(){this.close()}});this.tooltipHelpDlg.domNode.parentNode&&v.set(this.tooltipHelpDlg.domNode.parentNode,"overflowY","hidden")},close:function(b,a){m.close(this.tooltipHelpDlg)}});q("extend-esri")&&h.setObject("dijit.analysis.HelpWindow",l,B);return l});