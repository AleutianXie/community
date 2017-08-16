// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
require({cache:{"url:esri/dijit/geoenrichment/templates/EnrichOptionsPage.html":'\x3cdiv data-dojo-type\x3d"dijit/layout/ContentPane" data-dojo-props\x3d"row: 0" style\x3d"padding-bottom: 0;"\x3e\r\n    \x3cdiv class\x3d"EnrichOptionsPage_Stacking EnrichOptionsPage_TrimWithEllipsis"\x3e\r\n        ${nls.selectedVariables}\r\n        \x3cspan data-dojo-attach-point\x3d"dataCollectionNames"\x3e\x3c/span\x3e\r\n    \x3c/div\x3e\r\n    \x3cdiv data-dojo-attach-point\x3d"bufferDiv" class\x3d"EnrichOptionsPage_Stacking"\x3e\r\n        ${nls.bufferOptions}\r\n        \x3cspan data-dojo-attach-point\x3d"bufferString"\x3e\x3c/span\x3e\r\n        \x3cspan data-dojo-attach-point\x3d"bufferEdit"\x3e(\x3cspan class\x3d"Wizard_Link" data-dojo-attach-event\x3d"click: _editBuffer"\x3e${nls.edit}\x3c/span\x3e)\x3c/span\x3e\r\n    \x3c/div\x3e\r\n    \x3cdiv data-dojo-attach-point\x3d"bufferEditDiv" class\x3d"Wizard_AltRow EnrichOptionsPage_Stacking" style\x3d"display: none;"\x3e\x3c/div\x3e\r\n    \x3cdiv data-dojo-attach-point\x3d"totalVars" class\x3d"EnrichOptionsPage_Stacking"\x3e\x26nbsp;\x3c/div\x3e\r\n\x3c/div\x3e\r\n\x3cdiv data-dojo-type\x3d"dijit/layout/ContentPane" data-dojo-attach-point\x3d"fieldsPane" data-dojo-props\x3d"row: 1" style\x3d"padding-top: 0; padding-bottom: 0;"\x3e\r\n    \x3cdiv data-dojo-attach-point\x3d"fieldsDiv" class\x3d"EnrichOptionsPage_Fields"\x3e\x3c/div\x3e\r\n\x3c/div\x3e\r\n\x3cdiv data-dojo-type\x3d"dijit/layout/ContentPane" data-dojo-props\x3d"row: 2" style\x3d"padding-top: 0;"\x3e\r\n    \x3cdiv data-dojo-attach-point\x3d"overwriteExisting" class\x3d"EnrichOptionsPage_OverwriteExisting EnrichOptionsPage_Stacking"\x3e${nls.overwriteExisting}\x3c/div\x3e\r\n    \x3cdiv class\x3d"Wizard_Buttons"\x3e\r\n        \x3cbutton class\x3d"Wizard_Button" data-dojo-attach-point\x3d"backButton" data-dojo-attach-event\x3d"click: _back"\x3e${nls.back}\x3c/button\x3e\r\n        \x3cbutton class\x3d"Wizard_Button" data-dojo-attach-point\x3d"finishButton" data-dojo-attach-event\x3d"click: _finish" disabled\x3d"disabled"\x3e${nls.finish}\x3c/button\x3e\r\n    \x3c/div\x3e\r\n\x3c/div\x3e\r\n'}});
define("esri/dijit/geoenrichment/EnrichOptionsPage","../../declare dojo/_base/lang dojo/dom-construct dojo/dom-class dojo/Stateful dojo/number dojo/string dojo/aspect ./_WizardPage dojo/i18n!../../nls/jsapi dojo/text!./templates/EnrichOptionsPage.html ../../tasks/geoenrichment/RingBuffer ../../tasks/geoenrichment/DriveBuffer ./BufferOptions dojox/html/entities ./_Invoke dgrid/OnDemandGrid dgrid/extensions/DijitRegistry dojo/store/Memory dojo/data/ObjectStore dgrid/tree dijit/form/Select dijit/form/CheckBox dojox/mvc/sync ./config ../../request ../../urlUtils ./lang dijit/registry dijit/layout/ContentPane dijit/form/NumberSpinner dijit/form/RadioButton".split(" "),
function(m,g,p,x,n,y,q,z,A,f,B,C,D,E,v,F,G,H,I,J,K,L,M,w,r,N,O,P,Q){f=f.geoenrichment.dijit.EnrichOptionsPage;var R=m([J],{getChildren:function(a){return a.getChildren()},mayHaveChildren:function(a){return!!a.getChildren}});n=m([n],{checked:!0,getLabel:function(){},getClass:function(){return""}});var T=m([n],{_children:null,_updateChildren:!0,_label:null,constructor:function(a,b,d){this.set("id2",a);this._label=a;this._children=[];a=g.hitch(this,this._onChildChecked);for(var c=0;c<b.length;c++){var e=
new S(b[c],d);e.watch("checked",a);this._children.push(e)}},_checkedSetter:function(a){if(this.checked!=a&&(this.checked=a,this._updateChildren&&this._children))for(a=0;a<this._children.length;a++)this._children[a].set("checked",this.checked)},_onChildChecked:function(a,b,d){if(b!=d){a=!1;for(b=0;b<this._children.length;b++)if(this._children[b].get("checked")){a=!0;break}this._updateChildren=!1;this.set("checked",a);this._updateChildren=!0}},getLabel:function(){return this._label},getChildren:function(){return this._children}}),
S=m([n],{mapTo:null,_page:null,constructor:function(a,b){this._page=b;this.id2=a.id2;this.mapTo=a.mapTo},_checkedSetter:function(a){this.checked!=a&&(this.checked=a,this._page.invoke("_updateTotalVars"))},_mapToSetter:function(a){this.mapTo!=a&&(this.mapTo=a,this._page.invoke("_updateTotalVars"))},getLabel:function(){return this.alias},getClass:function(){return"EnrichOptionsPage_VariableCheckbox"},getOptions:function(){var a=[],b=!0!==this._page.allowFieldTypeMismatch;a.push({value:"_",label:v.encode(this._page.allowNewColumns?
f.newColumn:f.noColumn)});if(this._page.fields)for(var d=0;d<this._page.fields.length;d++){var c=this._page.fields[d];if(b&&c.type&&c.type!=this.type){var e=!1;"esriFieldTypeInteger"==c.type&&"esriFieldTypeDouble"==this.type&&0===this.precision?e=!0:"esriFieldTypeInteger"==this.type&&"esriFieldTypeDouble"==c.type&&(e=!0);if(!e)continue}a.push({value:c.id,label:v.encode(c.label||c.id)})}return a}}),U=m([G,H],{removeRow:function(a,b){var d=Q.findWidgets(a);if(d)for(var c=0;c<d.length;c++)d[c].destroy();
this.inherited(arguments)}});return m("esri.dijit.geoenrichment.EnrichOptionsPage",[A,F],{templateString:B,nls:f,geomType:null,buffer:null,fields:null,allowNewColumns:!0,dataCollections:null,studyAreaCount:null,title:null,_bufferOptions:null,_fieldSelects:null,_grid:null,_model:null,_eventMap:{back:!0,finish:!0},constructor:function(){this.buffer=new C},_setGeomTypeAttr:function(a){this._set("geomType",a);switch(this.geomType){case "esriGeometryPolygon":this.bufferEdit.style.display="none";this.bufferString.innerHTML=
f.bufferPolygon;break;case "esriGeometryPoint":this.bufferEdit.style.display="";this.bufferString.innerHTML=f.bufferRing;break;case "esriGeometryPolyline":this.bufferEdit.style.display="",this.bufferString.innerHTML=f.bufferRing}},_setFieldsMapAttr:function(a){for(var b=[],d={},c=0;c<this.dataCollections.length;c++)for(var e=this.dataCollections[c],t=0;t<e.variables.length;t++){var h=e.variables[t];h.id2=e.id+"."+h.id;var k=a[h.id2];if(g.isString(k)){h.mapTo=k;var k=h.fieldCategory,l=d[k];l||(l=d[k]=
[]);l.push(h);b.push(h.description)}}this._model=[];for(var u in d)d.hasOwnProperty(u)&&this._model.push(new T(u,d[u],this));this.dataCollectionNames.innerHTML=b.join(", ");this.dataCollectionNames.title=b.join("\n");a=new I({data:this._model,idProperty:"id2"});a=new R(a);this._grid?this._grid.set("store",a):(b=[K({label:" ",field:"expander",shouldExpand:g.hitch(this,this._shouldExpand)}),{label:f.varName,field:"varName",sortable:!1,renderCell:g.hitch(this,this._renderCheckBox)}],this.fields&&b.push({label:f.column,
field:"column",sortable:!1,renderCell:g.hitch(this,this._renderSelect)}),this._grid=new U({store:a,columns:b},this.fieldsDiv),z.after(this._grid,"expand",g.hitch(this,this.invoke,"resize")),this._grid.startup());this.invoke("_updateTotalVars")},_shouldExpand:function(a,b,d){return void 0!==d?d:1==this._model.length},_renderCheckBox:function(a,b,d,c){b=new M;d=a.getLabel();w(a,"checked",b,"checked");c=p.create("label",{"class":"EnrichOptionsPage_TrimWithEllipsis EnrichOptionsPage_CheckboxLabel",title:d});
x.add(c,a.getClass());b.placeAt(c);p.create("span",{innerHTML:d},c);return c},_renderSelect:function(a,b,d,c){if(a.getOptions)return b=new L({options:a.getOptions(),maxHeight:151}),w(a,"mapTo",b,"value",{converter:{format:function(a){return a||"_"},parse:function(a){return"_"!=a?a:null}}}),b.domNode},_updateTotalVars:function(){function a(a,c){P.isNumber(a)&&(a=q.substitute(f.credits,{credits:y.format(a)}));var e={varCount:d,rowCount:k,credits:a};b.totalVars.innerHTML=q.substitute(g,e);void 0===c&&
(c=q.substitute(h,e));b.totalVars.title=c}var b=this,d=0,c=!1;this._enumCheckedVars(function(a,b){d++;b.mapTo&&(c=!0)});this.overwriteExisting.style.visibility=c?"visible":"hidden";this.finishButton.disabled=0===d;var e={enrichVariableCount:d,f:"json"};this.get("buffer")instanceof D&&(e.serviceAreaCount=1);var g,h,k;this.studyAreaCount?(g=f.totalVars,h=f.totalVarsTooltip,k=this.studyAreaCount):(g=f.varsPerRow,h=f.varsPerRowTooltip,k=1);r.token&&(e.token=r.token);var l=r.portalUrl;0>l.indexOf("://")&&
(l=O.getProtocolForWebResource()+"//"+l);a(f.creditsCalc,"");N({url:l+"/sharing/rest/portals/self/cost",content:e}).then(function(b){a(b.transactionCreditCost*k)},function(b){a("error",b.toString())})},_getBufferAttr:function(){return this._bufferOptions?this._bufferOptions.get("buffer"):this.buffer},_setBufferAttr:function(a){this._set("buffer",a);this._bufferOptions&&this._bufferOptions.set("buffer",a)},_editBuffer:function(){p.destroy(this.bufferDiv);this.bufferEditDiv.style.display="";this._bufferOptions=
new E({buffer:this.buffer,onChange:g.hitch(this,this.invoke,"_updateTotalVars")});this.buffer=void 0;this._bufferOptions.placeAt(this.bufferEditDiv);this.resize()},_getFieldsMapAttr:function(){var a={};this._enumCheckedVars(function(b,d){a[d.id2]=d.mapTo||""});return a},_enumCheckedVars:function(a){for(var b=0;b<this._model.length;b++)for(var d=this._model[b].getChildren(),c=0;c<d.length;c++)d[c].checked&&(this.allowNewColumns||d[c].mapTo)&&a(this._model[b],d[c])},_back:function(){this.onBack()},
onBack:function(){},_finish:function(){this.onFinish()},onFinish:function(){}})});