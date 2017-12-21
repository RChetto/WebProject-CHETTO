$(document).ready(function(){


$(".datepickerdebut").datepicker({closeText: 'Fermer'});
$('.datepickerdebut').datepicker("option","minDate", new Date());
//$('.datepickerdebut').datepicker("option","maxDate","+10D");


//$( ".datepickerdebut" ).datepicker({ minDate: -1, maxDate: "+1M +10D" });

$(".datepickerfin").datepicker();
$('.datepickerfin').datepicker("option","minDate", new Date());


/*

https://api.jqueryui.com/datepicker/

*/

});