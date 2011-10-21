/*SUPER SEXY JS*/

$(document).ready(function() {
	
	$('.remove-employee').attr('disabled','disabled');
	
	
	$('.getstarted').click(function()
	{
		$(this).remove();
		$("#addEmployeesForm").fadeIn();
	});
	
	$('.add-employee').click(function()
	{
		addEmployee();
	});
	
	$('.remove-employee').click(function()
	{
		removeEmployee();
	});
	

});

function addEmployee()
{
	var currNum = $('.clones').length; //how many we got?
	var num = new Number(currNum+1); //new clone's numeric ID
	
	var newElem = $("#employee-input"+currNum).clone().attr('id', 'employee-input'+num);

	newElem.children(':first').attr('id', 'e_fname'+num).attr('name', 'e_fname'+num);
	newElem.children(':first').next().attr('id', 'e_lname'+num).attr('name', 'e_lname'+num);
	newElem.children(':last').attr('id', 'rate'+num).attr('name', 'rate'+num);
	
	$('.remove-employee').attr('disabled', '');
	
	$("#employee-input" + currNum).after(newElem);
	
}

function removeEmployee()
{
	
	var num = $('.clones').length; //how many we got?
	$("#employee-input"+ num).remove();
	
	$(".add-employee").attr('enabled', '');
	
	if(num-1 == 1)
	{
		$('.remove-employee').attr('disabled', 'disabled');
	}
}