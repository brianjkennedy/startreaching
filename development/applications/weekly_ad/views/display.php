<? include 'head.php'; ?>

<div id="container">
<!-- 	<h1><? echo $data->name; ?></h1> -->

	<div id="body">
		<h4>Pages</h4>
		<div class="right">
			<!--p>Made to <a class="reach" href="http://www.startreaching.us" target="_blank">REACH</a></p-->
		</div>
		<!--<div class="options">
			<span class="print"><a href="#">Print Ad</a></span>
			<span class="send"><a href="#">Send Ad</a></span>
		</div>end options-->
		<div id="ads">
			
			<? 
			
			foreach($files as $ad)
			{
				$ad = $location."/".$ad;
				echo "<img src='$ad' class='ad' />";
			}
			
			?>
			
			
			
		</div><!--end ads-->
		
	</div>

</div>
<? include 'foot.php'; ?>
