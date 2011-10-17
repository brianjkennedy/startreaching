<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Specials</title>
	<link rel="stylesheet" href="css/specials/styles.css" media="screen" charset="utf-8" />
	<script src="http://tools.startreacing.us/jquery.latest.js" type="text/javascript"></script>
	<script src="js/specials/site.js" type="text/javascript"></script>
</head>
<body>

<div id="shell">
	<div id="container">
		<div id="content">
			<h1>Welcome to Specials!</h1>
			<?php
				echo form_open('email/send');
					$options = array(
			          'deli'  => 'Deli',
			          'bakery'    => 'Bakery',
			          'produce'   => 'Produce',
			          'meat' => 'Meat',
			        );
				echo form_dropdown('specials', $options);	
			?>
			<div id="specials">
				<div class="special">
					<h1>Deli Specials</h1>
				</div>
				<div class="special">
					<h1>Bakery Specials</h1>
				</div>
				<div class="special">
					<h1>Produce Specials</h1>
				</div>
				<div class="special">
					<h1>Meat Specials</h1>
				</div>			
			</div>
		</div>
	</div>	
</div>

</body>
</html>