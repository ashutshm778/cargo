!function(o){"use strict";function e(){}e.prototype.init=function(){console.log("Working"),o("#colorpicker-default").spectrum(),o("#colorpicker-showalpha").spectrum({showAlpha:!0}),o("#colorpicker-showpaletteonly").spectrum({showPaletteOnly:!0,showPalette:!0,palette:[["#3bafda","white","#675aa9","rgb(255, 128, 0);","#f672a7"],["red","yellow","green","blue","violet"]]}),o("#colorpicker-togglepaletteonly").spectrum({showPaletteOnly:!0,togglePaletteOnly:!0,togglePaletteMoreText:"more",togglePaletteLessText:"less",palette:[["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]]}),o("#colorpicker-showintial").spectrum({showInitial:!0}),o("#colorpicker-showinput-intial").spectrum({showInitial:!0,showInput:!0}),o(".clockpicker").clockpicker({donetext:"Done"}),o("#single-input").clockpicker({placement:"bottom",align:"left",autoclose:!0,default:"now"}),o("#check-minutes").click(function(e){e.stopPropagation(),o("#single-input").clockpicker("show").clockpicker("toggleView","minutes")}),o(".input-daterange-datepicker").daterangepicker({buttonClasses:["btn","btn-sm"],applyClass:"btn-secondary",cancelClass:"btn-primary"}),o(".input-daterange-timepicker").daterangepicker({timePicker:!0,format:"MM/DD/YYYY h:mm A",timePickerIncrement:30,timePicker12Hour:!0,timePickerSeconds:!1,buttonClasses:["btn","btn-sm"],applyClass:"btn-secondary",cancelClass:"btn-primary"}),o(".input-limit-datepicker").daterangepicker({format:"MM/DD/YYYY",minDate:"06/01/2020",maxDate:"06/30/2020",buttonClasses:["btn","btn-sm"],applyClass:"btn-secondary",cancelClass:"btn-primary",dateLimit:{days:6}}),o("#reportrange span").html(moment().subtract(29,"days").format("MMMM D, YYYY")+" - "+moment().format("MMMM D, YYYY")),o("#reportrange").daterangepicker({format:"MM/DD/YYYY",startDate:moment().subtract(29,"days"),endDate:moment(),minDate:"01/01/2020",maxDate:"12/31/2020",dateLimit:{days:60},showDropdowns:!0,showWeekNumbers:!0,timePicker:!1,timePickerIncrement:1,timePicker12Hour:!0,ranges:{Today:[moment(),moment()],Yesterday:[moment().subtract(1,"days"),moment().subtract(1,"days")],"Last 7 Days":[moment().subtract(6,"days"),moment()],"Last 30 Days":[moment().subtract(29,"days"),moment()],"This Month":[moment().startOf("month"),moment().endOf("month")],"Last Month":[moment().subtract(1,"month").startOf("month"),moment().subtract(1,"month").endOf("month")]},opens:"left",drops:"down",buttonClasses:["btn","btn-sm"],applyClass:"btn-success",cancelClass:"btn-secondary",separator:" to ",locale:{applyLabel:"Submit",cancelLabel:"Cancel",fromLabel:"From",toLabel:"To",customRangeLabel:"Custom",daysOfWeek:["Su","Mo","Tu","We","Th","Fr","Sa"],monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],firstDay:1}},function(e,t,a){console.log(e.toISOString(),t.toISOString(),a),o("#reportrange span").html(e.format("MMMM D, YYYY")+" - "+t.format("MMMM D, YYYY"))})},o.FormPickers=new e,o.FormPickers.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.FormPickers.init()}();
