// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
require({cache:{"url:esri/dijit/analysis/templates/FindExistingLocations.html":'\x3cdiv class\x3d"esriAnalysis"\x3e\r\n    \x3cdiv data-dojo-type\x3d"dijit/layout/ContentPane" style\x3d"margin-top:0.5em; margin-bottom: 0.5em;"\x3e\r\n      \x3cdiv data-dojo-attach-point\x3d"_aggregateToolContentTitle" class\x3d"analysisTitle"\x3e\r\n        \x3ctable class\x3d"esriFormTable" \x3e \r\n          \x3ctr\x3e\r\n            \x3ctd class\x3d"esriToolIconTd"\x3e\x3cdiv class\x3d"findLocationsIcon"\x3e\x3c/div\x3e\x3c/td\x3e\r\n            \x3ctd class\x3d"esriAlignLeading esriAnalysisTitle" data-dojo-attach-point\x3d"_toolTitle"\x3e\r\n              \x3clabel data-dojo-attach-point\x3d"_titleLbl"\x3e${i18n.findExistingLocations}\x3c/label\x3e\r\n              \x3cnav class\x3d"breadcrumbs"  data-dojo-attach-point\x3d"_analysisModeLblNode" style\x3d"display:none;"\x3e\r\n                \x3ca href\x3d"#" class\x3d"crumb" style\x3d"font-size:12px;" data-dojo-attach-event\x3d"onclick:_handleModeCrumbClick" data-dojo-attach-point\x3d"_analysisModeCrumb"\x3e\x3c/a\x3e\r\n                \x3ca href\x3d"#" class\x3d"crumb is-active" data-dojo-attach-point\x3d"_analysisTitleCrumb" style\x3d"font-size:16px;"\x3e${i18n.findExistingLocations}\x3c/a\x3e\r\n              \x3c/nav\x3e              \r\n            \x3c/td\x3e\r\n            \x3ctd\x3e\r\n              \x3cdiv class\x3d"esriFloatTrailing" style\x3d"padding:0;"\x3e\r\n                  \x3cdiv class\x3d"esriFloatLeading"\x3e\r\n                    \x3ca href\x3d"#" class\x3d\'esriFloatLeading helpIcon\' esriHelpTopic\x3d"toolDescription"\x3e\x3c/a\x3e\r\n                  \x3c/div\x3e\r\n                  \x3cdiv class\x3d"esriFloatTrailing"\x3e\r\n                    \x3ca href\x3d"#" data-dojo-attach-point\x3d"_closeBtn" title\x3d"${i18n.close}" class\x3d"esriAnalysisCloseIcon"\x3e\x3c/a\x3e\r\n                  \x3c/div\x3e              \r\n              \x3c/div\x3e                \r\n            \x3c/td\x3e\r\n          \x3c/tr\x3e\r\n        \x3c/table\x3e\r\n      \x3c/div\x3e\r\n      \x3cdiv style\x3d"clear:both; border-bottom: #CCC thin solid; height:1px;width:100%;"\x3e\x3c/div\x3e\r\n    \x3c/div\x3e\r\n    \x3cdiv data-dojo-type\x3d"dijit/form/Form" data-dojo-attach-point\x3d"_form" readOnly\x3d"true"\x3e\r\n       \x3ctable class\x3d"esriFormTable"  data-dojo-attach-point\x3d"_aggregateTable"  style\x3d"border-collapse:collapse;border-spacing:5px;" cellpadding\x3d"5px" cellspacing\x3d"5px"\x3e \r\n         \x3ctbody\x3e\r\n          \x3ctr data-dojo-attach-point\x3d"_analysisLabelRow" style\x3d"display:none;"\x3e\r\n            \x3ctd colspan\x3d"2" style\x3d"padding-bottom:0;"\x3e\r\n              \x3clabel class\x3d"esriFloatLeading  esriTrailingMargin025 esriAnalysisNumberLabel"\x3e${i18n.oneLabel}\x3c/label\x3e\r\n              \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.analysisLayerLabel}\x3c/label\x3e\r\n            \x3c/td\x3e\r\n            \x3ctd class\x3d"shortTextInput" style\x3d"padding-bottom:0;"\x3e\r\n              \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' esriHelpTopic\x3d"inputLayers"\x3e\x3c/a\x3e\r\n            \x3c/td\x3e\r\n          \x3c/tr\x3e           \r\n          \x3ctr data-dojo-attach-point\x3d"_selectAnalysisRow" style\x3d"display:none;"\x3e\r\n            \x3ctd  colspan\x3d"3" style\x3d"padding-top:0;"\x3e\r\n              \x3cselect class\x3d"esriLeadingMargin1 longInput esriLongLabel"  style\x3d"margin-top:1.0em;" data-dojo-type\x3d"dijit/form/Select" data-dojo-attach-point\x3d"_analysisSelect" data-dojo-attach-event\x3d"onChange:_handleAnalysisLayerChange"\x3e\x3c/select\x3e\r\n            \x3c/td\x3e\r\n          \x3c/tr\x3e\r\n          \x3ctr\x3e\r\n            \x3ctd colspan\x3d"2"\x3e\r\n              \x3clabel class\x3d"esriFloatLeading  esriTrailingMargin025 esriAnalysisNumberLabel"\x3e${i18n.oneLabel}\x3c/label\x3e\r\n              \x3clabel data-dojo-attach-point\x3d"_findExpLabel" class\x3d"esriAnalysisStepsLabel"\x3e${i18n.findExpLabel}\x3c/label\x3e\r\n            \x3c/td\x3e\r\n            \x3ctd class\x3d"shortTextInput"\x3e\r\n              \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' esriHelpTopic\x3d"Expression"\x3e\x3c/a\x3e\r\n            \x3c/td\x3e\r\n          \x3c/tr\x3e \r\n          \x3ctr\x3e\r\n            \x3ctd colspan\x3d"3" style\x3d"padding:1px" data-dojo-attach-point\x3d"_expressionGridTd"\x3e\r\n            \x3c/td\x3e\r\n          \x3c/tr\x3e\r\n          \x3ctr\x3e\r\n            \x3ctd colspan\x3d"3" class\x3d"clear"\x3e\x3c/td\x3e\r\n          \x3c/tr\x3e\r\n           \r\n          \x3ctr\x3e\r\n            \x3ctd colspan\x3d"2"\x3e\r\n              \x3clabel class\x3d"esriFloatLeading esriTrailingMargin025 esriAnalysisNumberLabel"\x3e${i18n.twoLabel}\x3c/label\x3e\r\n              \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.outputLayerLabel}\x3c/label\x3e\r\n            \x3c/td\x3e\r\n            \x3ctd class\x3d"shortTextInput"\x3e\r\n              \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' esriHelpTopic\x3d"OuputName"\x3e\x3c/a\x3e \r\n            \x3c/td\x3e             \r\n          \x3c/tr\x3e\r\n          \x3ctr\x3e\r\n            \x3ctd colspan\x3d"3"\x3e\r\n              \x3cinput type\x3d"text" data-dojo-type\x3d"dijit/form/ValidationTextBox" class\x3d"esriLeadingMargin1 longInput" data-dojo-props\x3d"trim:true,required:true" data-dojo-attach-point\x3d"_outputLayerInput" value\x3d""\x3e\x3c/input\x3e\r\n            \x3c/td\x3e                \r\n          \x3c/tr\x3e\r\n          \x3ctr\x3e\r\n            \x3ctd colspan\x3d"3"\x3e\r\n               \x3cdiv class\x3d"esriLeadingMargin1" data-dojo-attach-point\x3d"_chooseFolderRow"\x3e\r\n                 \x3clabel style\x3d"width:9px;font-size:smaller;"\x3e${i18n.saveResultIn}\x3c/label\x3e\r\n                 \x3cinput class\x3d"longInput esriFolderSelect" data-dojo-attach-point\x3d"_webMapFolderSelect" dojotype\x3d"dijit/form/FilteringSelect" trim\x3d"true"\x3e\x3c/input\x3e\r\n               \x3c/div\x3e              \r\n            \x3c/td\x3e\r\n          \x3c/tr\x3e\r\n        \x3c/tbody\x3e         \r\n       \x3c/table\x3e\r\n     \x3c/div\x3e\r\n    \x3cdiv data-dojo-attach-point\x3d"_aggregateToolContentButtons" style\x3d"padding:5px;margin-top:5px;border-top:solid 1px #BBB;"\x3e\r\n      \x3cdiv class\x3d"esriExtentCreditsCtr"\x3e\r\n        \x3ca class\x3d"esriFloatTrailing esriSmallFont"  href\x3d"#" data-dojo-attach-point\x3d"_showCreditsLink" data-dojo-attach-event\x3d"onclick:_handleShowCreditsClick" style\x3d"color:grey;cursor:default;"\x3e${i18n.showCredits}\x3c/a\x3e\r\n       \x3clabel data-dojo-attach-point\x3d"_chooseExtentDiv" class\x3d"esriSelectLabel esriExtentLabel"\x3e\r\n         \x3cinput type\x3d"radio" data-dojo-attach-point\x3d"_useExtentCheck" data-dojo-type\x3d"dijit/form/CheckBox" data-dojo-props\x3d"checked:true" name\x3d"extent" value\x3d"true"/\x3e\r\n           ${i18n.useMapExtent}\r\n       \x3c/label\x3e\r\n      \x3c/div\x3e\r\n      \x3cbutton data-dojo-type\x3d"dijit/form/Button" type\x3d"submit" data-dojo-attach-point\x3d"_saveBtn" class\x3d"esriLeadingMargin4 esriAnalysisSubmitButton" data-dojo-attach-event\x3d"onClick:_handleSaveBtnClick"\x3e\r\n          ${i18n.runAnalysis}\r\n      \x3c/button\x3e\r\n    \x3c/div\x3e\r\n    \x3cdiv data-dojo-type\x3d"dijit/Dialog" title\x3d"${i18n.creditTitle}" data-dojo-attach-point\x3d"_usageDialog" style\x3d"width:40em;"\x3e\r\n      \x3cdiv data-dojo-type\x3d"esri/dijit/analysis/CreditEstimator"  data-dojo-attach-point\x3d"_usageForm"\x3e\x3c/div\x3e\r\n    \x3c/div\x3e    \r\n  \x3c/div\x3e\r\n'}});
define("esri/dijit/analysis/FindExistingLocations","require dojo/_base/declare dojo/_base/lang dojo/_base/array dojo/_base/connect dojo/_base/json dojo/has dojo/json dojo/string dojo/dom-style dojo/dom-attr dojo/dom-construct dojo/query dojo/dom-class dijit/_WidgetBase dijit/_TemplatedMixin dijit/_WidgetsInTemplateMixin dijit/_OnDijitClickMixin dijit/_FocusMixin dijit/registry dijit/form/Button dijit/form/CheckBox dijit/form/Form dijit/form/Select dijit/form/TextBox dijit/form/ValidationTextBox dijit/layout/ContentPane dijit/form/FilteringSelect dijit/Dialog ../../kernel ../../lang ./AnalysisBase ./_AnalysisOptions ./utils ./CreditEstimator ./ExpressionGrid dojo/i18n!../../nls/jsapi dojo/text!./templates/FindExistingLocations.html".split(" "),
function(k,q,b,h,n,c,r,G,l,d,t,u,m,v,w,x,y,z,A,H,I,J,K,L,M,N,O,P,Q,B,R,C,D,g,S,E,p,F){k=q([w,x,y,z,A,D,C],{declaredClass:"esri.dijit.analysis.FindExistingLocations",templateString:F,widgetsInTemplate:!0,i18n:null,toolName:"FindExistingLocations",helpFileName:"FindExistingLocations",resultParameter:"resultLayer",primaryActionButttonClass:"esriAnalysisSubmitButton",analysisLayer:null,constructor:function(a){this._pbConnects=[];a.containerNode&&(this.container=a.containerNode)},destroy:function(){this.inherited(arguments);
h.forEach(this._pbConnects,n.disconnect);delete this._pbConnects},postMixInProperties:function(){this.inherited(arguments);b.mixin(this.i18n,p.findExistingLocations);b.mixin(this.i18n,p.expressionGrid)},postCreate:function(){this.inherited(arguments);v.add(this._form.domNode,"esriSimpleForm");this._outputLayerInput.set("validator",b.hitch(this,this.validateServiceName));this._buildUI()},startup:function(){},_onClose:function(a){a&&(this._save(),this.emit("save",{save:!0}));this.emit("close",{save:a})},
_handleSaveBtnClick:function(){if(this._form.validate()&&this.expressionGrid.validate()){this._saveBtn.set("disabled",!0);var a={},e={},f,b;b=this.expressionGrid.get("expressionMap");a.expressions=c.toJson(b.expressions);a.data=c.toJson(b.data);f=[];f=h.map(b.inputLayers,function(a){return this.constructAnalysisInputLyrObj(a)},this);a.aLayer=c.toJson(this.constructAnalysisInputLyrObj(this.analysisLayer));a.inputLayers=c.toJson(f);this.returnFeatureCollection||(a.OutputName=c.toJson({serviceProperties:{name:this._outputLayerInput.get("value")}}));
this.showChooseExtent&&this._useExtentCheck.get("checked")&&(a.context=c.toJson({extent:this.map.extent._normalize(!0)}));this.returnFeatureCollection&&(f={outSR:this.map.spatialReference},this.showChooseExtent&&this._useExtentCheck.get("checked")&&(f.extent=this.map.extent._normalize(!0)),a.context=c.toJson(f));e.jobParams=a;a=l.substitute(this.i18n.itemDescription,{analysisLayerName:this.analysisLayer.name});a+="\x3cdiv\x3e\x3ci\x3e\x3cu\x3e"+this.i18n.expression+"\x3c/u\x3e "+b.expressionString+
"\x3c/i\x3e\x3c/div\x3e";e.itemParams={description:a,tags:l.substitute(this.i18n.itemTags,{analysisLayerName:this.analysisLayer.name}),snippet:this.i18n.itemSnippet};this.showSelectFolder&&(e.itemParams.folder=this.get("folderId"));this.execute(e)}},_handleShowCreditsClick:function(a){a.preventDefault();a={};var e,f;this._form.validate()&&this.expressionGrid.validate()?(d.set(this._showCreditsLink,"color",""),d.set(this._showCreditsLink,"cursor",""),e=this.expressionGrid.get("expressionMap"),a.expressions=
c.toJson(e.expressions),f=[],f=h.map(e.inputLayers,function(a){return this.constructAnalysisInputLyrObj(a)},this),a.inputLayers=c.toJson(f),this.returnFeatureCollection||(a.OutputName=c.toJson({serviceProperties:{name:this._outputLayerInput.get("value")}})),this.showChooseExtent&&this._useExtentCheck.get("checked")&&(a.context=c.toJson({extent:this.map.extent._normalize(!0)})),this.returnFeatureCollection&&(e={outSR:this.map.spatialReference},this.showChooseExtent&&(e.extent=this.map.extent._normalize(!0)),
a.context=c.toJson(e)),this.getCreditsEstimate(this.toolName,a).then(b.hitch(this,function(a){this._usageForm.set("content",a);this._usageDialog.show()}))):(d.set(this._showCreditsLink,"color","grey"),d.set(this._showCreditsLink,"cursor","default"))},_save:function(){},_buildUI:function(){var a=!0;this.signInPromise.then(b.hitch(this,g.initHelpLinks,this.domNode,this.showHelp,{analysisGpServer:this.analysisGpServer}));this.get("showSelectAnalysisLayer")&&(this.get("analysisLayer")||!this.get("analysisLayers")||
this.rerun||this.set("analysisLayer",this.analysisLayers[0]),this.analysisLayer&&this.rerun&&this.inputLayers&&h.forEach(this.inputLayers,function(a){a&&this.analysisLayer&&(this.analysisLayer.url===a.url||this.analysisLayer.name===a.name)&&(this.analysisLayer=a)},this),g.populateAnalysisLayers(this,"analysisLayer","analysisLayers"));g.addReadyToUseLayerOption(this,[this._analysisSelect]);this.outputLayerName&&(this._outputLayerInput.set("value",this.outputLayerName),a=!1);this.rerun&&this.data&&
this.expressions&&this.selectedInputLayers&&g.updateExpressions(this);this.data&&(a=!1);this._updateAnalysisLayerUI(a);d.set(this._chooseFolderRow,"display",!0===this.showSelectFolder?"block":"none");this.showSelectFolder&&this.getFolderStore().then(b.hitch(this,function(a){this.folderStore=a;g.setupFoldersUI({folderStore:this.folderStore,folderId:this.folderId,folderName:this.folderName,folderSelect:this._webMapFolderSelect,username:this.portalUser?this.portalUser.username:""})}));d.set(this._chooseExtentDiv,
"display",!0===this.showChooseExtent?"inline-block":"none");d.set(this._showCreditsLink,"display",!0===this.showCredits?"block":"none");this._loadConnections()},_handleUpdateExpressions:function(a){1<a.length?(d.set(this._showCreditsLink,"color",""),d.set(this._showCreditsLink,"cursor","")):(d.set(this._showCreditsLink,"color","grey"),d.set(this._showCreditsLink,"cursor","default"))},_updateAnalysisLayerUI:function(a){this.analysisLayer&&(a&&(this.outputLayerName=l.substitute(this.i18n.outputLayerName,
{analysisLayerName:this.analysisLayer.name})),this._outputLayerInput.set("value",this.outputLayerName));t.set(this._findExpLabel,"innerHTML",this.i18n.findExpLabel);this.expressionGrid&&(this.expressionGrid.destroy(),this.expressionGrid=null);this.expressionGrid=new E({analysisLayer:this.analysisLayer,inputLayers:this.inputLayers,allowAllInputOperands:!1,primaryActionButttonClass:this.get("primaryActionButttonClass"),showReadyToUseLayers:this.get("showReadyToUseLayers"),owningWidget:this,data:!a&&
this.data},u.create("div",{style:"width:100%;"},this._expressionGridTd));this.expressionGrid.on("update-expressions",b.hitch(this,this._handleUpdateExpressions))},_handleAnalysisLayerChange:function(a){"browse"===a?this.showReadyToUseLayersDialog(!0):"browselayers"===a?(this.showGeoAnalyticsParams&&(m=this._browseLyrsdlg.browseItems.get("query"),m.types.push('type:"Big Data File Share"'),this._browseLyrsdlg.browseItems.set("query",m)),this._isAnalysisSelect=!0,this._browseLyrsdlg.show()):(this.analysisLayer=
this.analysisLayers[a],!this.inputLayers[a]&&this.analysisLayer&&this.inputLayers.push(this.analysisLayer),this._updateAnalysisLayerUI(!0))},showReadyToUseLayersDialog:function(a){this._isAnalysisSelect=a;this._browsedlg.show()},_loadConnections:function(){this.on("start",b.hitch(this,"_onClose",!0));this._connect(this._closeBtn,"onclick",b.hitch(this,"_onClose",!1))},_handleBrowseItemsSelect:function(a){a&&a.selection&&g.addAnalysisReadyLayer({item:a.selection,layers:this._isAnalysisSelect?this.analysisLayers:
this.inputLayers,layersSelect:this._isAnalysisSelect?this._analysisSelect:this.layersSelect,browseDialog:a.dialog||this._browsedlg,widget:this}).always(b.hitch(this,function(){this._isAnalysisSelect&&(this.analysisLayer=this.analysisLayers[this._analysisSelect.get("value")],this.inputLayers[this._analysisSelect.get("value")]||this.inputLayers.push(this.analysisLayer),this._updateAnalysisLayerUI(!0))}))},_setAnalysisGpServerAttr:function(a){a&&(this.analysisGpServer=a,this.set("toolServiceUrl",this.analysisGpServer+
"/"+this.toolName))},_setDisableRunAnalysisAttr:function(a){this._saveBtn.set("disabled",a)},_setInputLayersAttr:function(a){this.inputLayers=a},_getInputLayersAttr:function(){return this.inputLayers||[]},_setAnalysisLayerAttr:function(a){this.analysisLayer=a},_getAnalysisLayerAttr:function(){return this.analysisLayer},_setAnalysisLayersAttr:function(a){this.analysisLayers=a||[]},validateServiceName:function(a){return g.validateServiceName(a,{textInput:this._outputLayerInput})},_setPrimaryActionButttonClassAttr:function(a){this.primaryActionButttonClass=
a},_getPrimaryActionButttonClassAttr:function(){return this.primaryActionButttonClass},_connect:function(a,b,c){this._pbConnects.push(n.connect(a,b,c))}});r("extend-esri")&&b.setObject("dijit.analysis.FindExistingLocations",k,B);return k});