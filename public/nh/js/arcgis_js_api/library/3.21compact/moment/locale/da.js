//>>built
(function(a,b){"object"===typeof exports&&"undefined"!==typeof module&&"function"===typeof require?b(require("../moment")):"function"===typeof define&&define.amd?define("moment/locale/da",["../moment"],b):b(a.moment)})(this,function(a){return a.defineLocale("da",{months:"januar februar marts april maj juni juli august september oktober november december".split(" "),monthsShort:"jan feb mar apr maj jun jul aug sep okt nov dec".split(" "),weekdays:"s\u00f8ndag mandag tirsdag onsdag torsdag fredag l\u00f8rdag".split(" "),
weekdaysShort:"s\u00f8n man tir ons tor fre l\u00f8r".split(" "),weekdaysMin:"s\u00f8 ma ti on to fr l\u00f8".split(" "),longDateFormat:{LT:"HH:mm",LTS:"HH:mm:ss",L:"DD/MM/YYYY",LL:"D. MMMM YYYY",LLL:"D. MMMM YYYY HH:mm",LLLL:"dddd [d.] D. MMMM YYYY [kl.] HH:mm"},calendar:{sameDay:"[i dag kl.] LT",nextDay:"[i morgen kl.] LT",nextWeek:"p\u00e5 dddd [kl.] LT",lastDay:"[i g\u00e5r kl.] LT",lastWeek:"[i] dddd[s kl.] LT",sameElse:"L"},relativeTime:{future:"om %s",past:"%s siden",s:"f\u00e5 sekunder",m:"et minut",
mm:"%d minutter",h:"en time",hh:"%d timer",d:"en dag",dd:"%d dage",M:"en m\u00e5ned",MM:"%d m\u00e5neder",y:"et \u00e5r",yy:"%d \u00e5r"},dayOfMonthOrdinalParse:/\d{1,2}\./,ordinal:"%d.",week:{dow:1,doy:4}})});