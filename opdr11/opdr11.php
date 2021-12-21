<html> 
	<head> 
		<title>Opdracht 10</title>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type = "text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type = "text/javascript">
			google.charts.load ('current', {'packages':['corechart']}); // laat libarys in
			google.charts.setOnLoadCallback (loadData); // wacht tot geladen is, voordat de data erin gezet wordt
		</script>
	</head> 
	<body>
		
		<?php

		      if(isset($_POST['lamp'])) {
				echo "This is Button1 that is selected";
			}
			if(isset($_POST['button2'])) {
				echo "This is Button2 that is selected";
			}
		?>
		  
		<form method="post">
			<input type="submit" name="Lamp" value="lamp"/>
			  
			<input type="submit" name="button2"
					value="Button2"/>
		</form>
		

	</body> 
</html>