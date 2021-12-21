<html> 
	<head> 
		<title>Opdracht 11</title>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type = "text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type = "text/javascript">
			google.charts.load ('current', {'packages':['corechart']}); // laat libarys in
			google.charts.setOnLoadCallback (loadData); // wacht tot geladen is, voordat de data erin gezet wordt



        <form method= "post">
        ipadres: <input type="boolean" size="5" name="Lamp" value="<?php echo $Lamp;?> "> 
        <input type="submit">

	</head> 
	<body>

    <?php
    $Lamp = "iets";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// actie
	}


    ?>