// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/dijit/metadata/form/fgdc/InputTime","dojo/_base/declare dojo/_base/lang dojo/has ../InputText dojo/i18n!../../nls/i18nBase ../../../../kernel".split(" "),function(h,k,l,m,n,p){h=h([m],{_isFgdcInputTime:!0,hint:n.hints.fgdcTime,small:!0,postCreate:function(){this.inherited(arguments)},getXmlValue:function(){var b=this.inherited(arguments);"string"===typeof b&&null!==b&&(b=b.replace(/:/g,""),b=b.replace(/\./g,""));return b},importValue:function(b,f){var a;a=null;var g,c=[],d="",e="";if("string"!==
typeof f||null===f)this.inherited(arguments);else if(-1!==f.indexOf("T"))this.inherited(arguments);else if(-1!==f.indexOf(":"))this.inherited(arguments);else if(-1!==f.indexOf("."))this.inherited(arguments);else if(a=k.trim(f),-1!==a.indexOf("+")?(c=a.split("+"),e="+"):-1!==a.indexOf("-")?(c=a.split("-"),e="-"):(-1!==a.indexOf("Z")?(c=a.split("Z"),e="Z"):c[0]=a,c[1]=""),2!==c.length)this.inherited(arguments);else{g=c[0];for(a=0;a<g.length;a++)2===d.length?d+=":":5===d.length?d+=":":8===d.length&&
(d+="."),d+=g[a];g=c[1];for(a=0;a<g.length;a++)3===e.length&&(e+=":"),e+=g[a];this.setInputValue(d+e)}}});l("extend-esri")&&k.setObject("dijit.metadata.form.fgdc.InputTime",h,p);return h});