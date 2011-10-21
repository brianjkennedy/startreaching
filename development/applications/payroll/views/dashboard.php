
	<style type="text/css">

		</style>
</head>
<body>

<div id="container">
	<h1>Welcome <? echo $this->session->userdata('fname'); ?>!</h1>
	
	
	<div id="projections">
		<h3>Weekly Projections</h3>
		
		<h4>Sales</h4>
		<?
			echo form_open('dashboard/project_sales', array('id'=>'project_sales', 'name'=>'project_sales'));
			echo form_input('sales_projection', 'Sales Projection');
			
			echo $this->calendar->generate();
						
			echo form_close();
		?>
		<div>----------------</div>
		<h4>Overhead</h4>
		<?
			foreach($employee_list as $row)
			{
				echo $row->fname;
				echo " ";
				echo $row->lname;
				echo "<br/>";
			}
		?>
	</div>	
	
	<div id='add_employee'>
		<h3>Employees</h3>
		<div class="new_employee_fields">
		</div><!-- end new_employee_fields -->

		<? 
			echo form_open('dashboard/add_employee', array('id'=>'addEmployeesForm'));
		?>
		
		<div class="clones" id='employee-input1'>

			<?
			echo form_input('e_fname1', 'First Name');
			echo form_input('e_lname1', 'Last Name');
			echo form_input('rate1', 'Hourly Rate');
//			echo form_hidden('e_department1', $this->session->userdata('department'));
			?>

		</div><!-- end clones -->
		
		<div>
	        <input type="button" class='add-employee' value="add another name" />
	        <input type="button" class='remove-employee' value="remove name" />
	    </div>
		
		<?
			echo form_submit('submit', 'Add');
			
			echo form_close();
		?>
		
		<a href="#" class="getstarted">Get Started</a>
	</div><!-- end add_employee -->

	<div class='clear'></div>
</div>