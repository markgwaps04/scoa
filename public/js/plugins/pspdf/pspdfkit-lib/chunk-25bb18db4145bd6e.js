/*!
 * PSPDFKit for Web 2019.1.2 (https://pspdfkit.com/web)
 * 
 * Copyright (c) 2016-2019 PSPDFKit GmbH. All rights reserved.
 * 
 * THIS SOURCE CODE AND ANY ACCOMPANYING DOCUMENTATION ARE PROTECTED BY INTERNATIONAL COPYRIGHT LAW
 * AND MAY NOT BE RESOLD OR REDISTRIBUTED. USAGE IS BOUND TO THE PSPDFKIT LICENSE AGREEMENT.
 * UNAUTHORIZED REPRODUCTION OR DISTRIBUTION IS SUBJECT TO CIVIL AND CRIMINAL PENALTIES.
 * This notice may not be removed from this file.
 * 
 * PSPDFKit uses several open source third-party components: https://pspdfkit.com/acknowledgements/web/
 */
(window.__PSPDFKitChunk=window.__PSPDFKitChunk||[]).push([[19],{749:function(e,t,a){e.exports=function(){"use strict";return[{locale:"pl",pluralRuleFunction:function(e,t){var a=String(e).split("."),m=a[0],i=!a[1],u=m.slice(-1),n=m.slice(-2);return t?"other":1==e&&i?"one":i&&u>=2&&u<=4&&(n<12||n>14)?"few":i&&1!=m&&(0==u||1==u)||i&&u>=5&&u<=9||i&&n>=12&&n<=14?"many":"other"},fields:{year:{displayName:"rok",relative:{0:"w tym roku",1:"w przyszłym roku","-1":"w zeszłym roku"},relativeTime:{future:{one:"za {0} rok",few:"za {0} lata",many:"za {0} lat",other:"za {0} roku"},past:{one:"{0} rok temu",few:"{0} lata temu",many:"{0} lat temu",other:"{0} roku temu"}}},"year-short":{displayName:"r.",relative:{0:"w tym roku",1:"w przyszłym roku","-1":"w zeszłym roku"},relativeTime:{future:{one:"za {0} rok",few:"za {0} lata",many:"za {0} lat",other:"za {0} roku"},past:{one:"{0} rok temu",few:"{0} lata temu",many:"{0} lat temu",other:"{0} roku temu"}}},month:{displayName:"miesiąc",relative:{0:"w tym miesiącu",1:"w przyszłym miesiącu","-1":"w zeszłym miesiącu"},relativeTime:{future:{one:"za {0} miesiąc",few:"za {0} miesiące",many:"za {0} miesięcy",other:"za {0} miesiąca"},past:{one:"{0} miesiąc temu",few:"{0} miesiące temu",many:"{0} miesięcy temu",other:"{0} miesiąca temu"}}},"month-short":{displayName:"mies.",relative:{0:"w tym miesiącu",1:"w przyszłym miesiącu","-1":"w zeszłym miesiącu"},relativeTime:{future:{one:"za {0} mies.",few:"za {0} mies.",many:"za {0} mies.",other:"za {0} mies."},past:{one:"{0} mies. temu",few:"{0} mies. temu",many:"{0} mies. temu",other:"{0} mies. temu"}}},day:{displayName:"dzień",relative:{0:"dzisiaj",1:"jutro",2:"pojutrze","-2":"przedwczoraj","-1":"wczoraj"},relativeTime:{future:{one:"za {0} dzień",few:"za {0} dni",many:"za {0} dni",other:"za {0} dnia"},past:{one:"{0} dzień temu",few:"{0} dni temu",many:"{0} dni temu",other:"{0} dnia temu"}}},"day-short":{displayName:"dzień",relative:{0:"dzisiaj",1:"jutro",2:"pojutrze","-2":"przedwczoraj","-1":"wczoraj"},relativeTime:{future:{one:"za {0} dzień",few:"za {0} dni",many:"za {0} dni",other:"za {0} dnia"},past:{one:"{0} dzień temu",few:"{0} dni temu",many:"{0} dni temu",other:"{0} dnia temu"}}},hour:{displayName:"godzina",relative:{0:"ta godzina"},relativeTime:{future:{one:"za {0} godzinę",few:"za {0} godziny",many:"za {0} godzin",other:"za {0} godziny"},past:{one:"{0} godzinę temu",few:"{0} godziny temu",many:"{0} godzin temu",other:"{0} godziny temu"}}},"hour-short":{displayName:"godz.",relative:{0:"ta godzina"},relativeTime:{future:{one:"za {0} godz.",few:"za {0} godz.",many:"za {0} godz.",other:"za {0} godz."},past:{one:"{0} godz. temu",few:"{0} godz. temu",many:"{0} godz. temu",other:"{0} godz. temu"}}},minute:{displayName:"minuta",relative:{0:"ta minuta"},relativeTime:{future:{one:"za {0} minutę",few:"za {0} minuty",many:"za {0} minut",other:"za {0} minuty"},past:{one:"{0} minutę temu",few:"{0} minuty temu",many:"{0} minut temu",other:"{0} minuty temu"}}},"minute-short":{displayName:"min",relative:{0:"ta minuta"},relativeTime:{future:{one:"za {0} min",few:"za {0} min",many:"za {0} min",other:"za {0} min"},past:{one:"{0} min temu",few:"{0} min temu",many:"{0} min temu",other:"{0} min temu"}}},second:{displayName:"sekunda",relative:{0:"teraz"},relativeTime:{future:{one:"za {0} sekundę",few:"za {0} sekundy",many:"za {0} sekund",other:"za {0} sekundy"},past:{one:"{0} sekundę temu",few:"{0} sekundy temu",many:"{0} sekund temu",other:"{0} sekundy temu"}}},"second-short":{displayName:"sek.",relative:{0:"teraz"},relativeTime:{future:{one:"za {0} sek.",few:"za {0} sek.",many:"za {0} sek.",other:"za {0} sek."},past:{one:"{0} sek. temu",few:"{0} sek. temu",many:"{0} sek. temu",other:"{0} sek. temu"}}}}}]}()}}]);