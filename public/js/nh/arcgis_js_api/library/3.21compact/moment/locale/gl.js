//>>built
(function(b,a){"object"===typeof exports&&"undefined"!==typeof module&&"function"===typeof require?a(require("../moment")):"function"===typeof define&&define.amd?define("moment/locale/gl",["../moment"],a):a(b.moment)})(this,function(b){return b.defineLocale("gl",{months:"xaneiro febreiro marzo abril maio xu\u00f1o xullo agosto setembro outubro novembro decembro".split(" "),monthsShort:"xan. feb. mar. abr. mai. xu\u00f1. xul. ago. set. out. nov. dec.".split(" "),monthsParseExact:!0,weekdays:"domingo luns martes m\u00e9rcores xoves venres s\u00e1bado".split(" "),
weekdaysShort:"dom. lun. mar. m\u00e9r. xov. ven. s\u00e1b.".split(" "),weekdaysMin:"do lu ma m\u00e9 xo ve s\u00e1".split(" "),weekdaysParseExact:!0,longDateFormat:{LT:"H:mm",LTS:"H:mm:ss",L:"DD/MM/YYYY",LL:"D [de] MMMM [de] YYYY",LLL:"D [de] MMMM [de] YYYY H:mm",LLLL:"dddd, D [de] MMMM [de] YYYY H:mm"},calendar:{sameDay:function(){return"[hoxe "+(1!==this.hours()?"\u00e1s":"\u00e1")+"] LT"},nextDay:function(){return"[ma\u00f1\u00e1 "+(1!==this.hours()?"\u00e1s":"\u00e1")+"] LT"},nextWeek:function(){return"dddd ["+
(1!==this.hours()?"\u00e1s":"a")+"] LT"},lastDay:function(){return"[onte "+(1!==this.hours()?"\u00e1":"a")+"] LT"},lastWeek:function(){return"[o] dddd [pasado "+(1!==this.hours()?"\u00e1s":"a")+"] LT"},sameElse:"L"},relativeTime:{future:function(a){return 0===a.indexOf("un")?"n"+a:"en "+a},past:"hai %s",s:"uns segundos",m:"un minuto",mm:"%d minutos",h:"unha hora",hh:"%d horas",d:"un d\u00eda",dd:"%d d\u00edas",M:"un mes",MM:"%d meses",y:"un ano",yy:"%d anos"},dayOfMonthOrdinalParse:/\d{1,2}\u00ba/,
ordinal:"%d\u00ba",week:{dow:1,doy:4}})});