// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.21/esri/copyright.txt for details.
//>>built
define("esri/dijit/metadata/types/arcgis/base/conditionals/Conditionals","dojo/_base/declare dojo/_base/lang dojo/_base/array dojo/has ../../../../../../kernel dijit/_WidgetBase ./ISO19139A1_ROW4 ./ISO19139A1_ROW6 ./ISO19139A1_ROW7 ./ISO19139A1_ROW9 ./ISO19139A1_ROW10_11_12 ./ISO19139A1_ROW15 ./ISO19139A1_ROW18 ./INSPIRE_AccessLimitation ./INSPIRE_ConformanceResult ./INSPIRE_DomainConsistency ./INSPIRE_LineageStatement ./INSPIRE_UseLimitation ./FGDC_DescIfTemporal ./FGDC_Keywords ./FGDC_Reports ./FGDC_Temporal ./NAP_Contact ./GEN_BoundingBox ./GEN_ReportResult".split(" "),
function(d,l,p,g,h,q,r,t,m,u,v,w,H,x,y,z,A,B,C,D,E,F,G,n,k){d=d(q,{postCreate:function(){this.inherited(arguments)},connectXNode:function(c,e){var b=e.gxePath,d=c.isAgsISO19139||c.isAgsINSPIRE||c.isAgsNAP,f=c.isAgsINSPIRE,g=c.isAgsNAP,h=c.isAgsFGDC;if(!c.isViewOnly){var a=function(a){l.isArray(a)?p.forEach(a,function(a){a.parentXNode=e;a.startup()}):(a.parentXNode=e,a.startup());e.conditionalValidator=a};"/metadata/mdConst/LegConsts"===b?a(new m):"/metadata/dataIdInfo/resConst/LegConsts"===b?a(new m):
"/metadata/dataIdInfo/aggrInfo"===b?a(new t):"/metadata/spatRepInfo/Georect/chkPtDesc"===b&&a(new w);d&&("/metadata/dataIdInfo"===b?f?a([new n,new x,new B]):a(new r):"/metadata/dqInfo"===b?f&&a(new z):"/metadata/dqInfo/dqScope/scpLvl"===b?a(new u):"/metadata/dqInfo/dataLineage"===b?f||a(new v):"/metadata/dqInfo/dataLineage/statement"===b?f&&a(new A):"/metadata/dqInfo/report"===b&&(f?a([new y,new k]):a(new k)));h&&("/metadata/dataIdInfo"===b?a([new D,new n,new F]):"/metadata/dqInfo"===b?a(new E):"/metadata/dqInfo/report"===
b?a(new k):"exDesc"===e.target&&a(new C));g&&"rpCntInfo"===e.target&&a(new G)}}});g("extend-esri")&&l.setObject("dijit.metadata.types.arcgis.base.conditionals.Conditionals",d,h);return d});