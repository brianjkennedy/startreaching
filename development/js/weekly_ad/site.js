/*HAWT JS STUFF*/

$(document).ready(function() {
	/*
$('#ads').before('<div id="nav">').cycle({
		fx: 'fade',
		timeout: 0,
		pager: '#nav'
	});
*/

	$("#ads").nivoSlider({
		effect: 'fade',
		manualAdvance: true,
		animSpeed: 200,
		prevText: "",
		nextText: ""
	});
	
	var $height;
	findAdHeight($height);

});

function findAdHeight($height) 
{
	
	$(".ad:first").ready(function() 
	{
		$height = $(this).height();
	});
	
	$("#ads").height($height);
	
	$(".ad").each(function()
	{
		$(this).css('height', $height);
	});
	
}