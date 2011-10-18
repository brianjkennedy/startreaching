function checkTypes(id){
	$("#specials div").each(function() {
		var _types = $(this);
		var _class = $(this).attr("class");
		$(_types).hide();
		if(id === _class) {
			_types.fadeIn('slow');
		} else {
			_types.fadeOut('slow');
		}			
	});	
}
	
function types(){
	$(".links a").each(function() {
		var _link = jQuery(this);
		var _id = _link.attr('id');
		_link.click(function() {			
			checkTypes(_id);
		});
	});
}

$(document).ready(function() {
	$('#specials div').hide();
			
	checkTypes();
	types();
});