<html> 
	<head> 
		<title>Opdracht 10</title>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type = "text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
   		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.5.0/flatly/bootstrap.min.css"/>

   		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
   			type="text/javascript">
			google.charts.load ('current', {'packages':['corechart']}); // laat libarys in
			google.charts.setOnLoadCallback (loadData); // wacht tot geladen is, voordat de data erin gezet wordt

			function drawTable() {			
				var options = {
					title: 'Mooie Lampjes',
					curveType: 'function',
					legend: { position: 'bottom' }
				};

				$.ajax({
					//url: "", nog ff kijken hoe we dit fixen
					type: "POST",
					dataType: 'json',
					encode: true,
					data: {"Operation":"Table"},
					
					success: function (json) {
						if (json) {
							console.log(json);
							if (json.Response == "Successful") {
								var data = new google.visualization.DataTable();
								
								data.addColumn('string', 'Lamp');
								data.addColumn('number', 'Tijd');
								for (var i = 0; i < json.Data.length; i++) {
									//var deliverDate = Date.parse(json.Data[i].Date + " " + json.Data[i].DeliverTime);
									//var requestDate = Date.parse(json.Data[i].Date + " " + json.Data[i].RequestTime);
									//data.addRow([json.Data[i].Info, deliverDate - requestDate]);
								}
	
								var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
								chart.draw(data, options);
							}
						}
					},
					error: function (jXHR, textStatus, errorThrown) {
						alert(errorThrown);
					}
				});
			}
    </script>
	</head> 
	<body>
		
		<?php

			function sendQuery($sql) {
				$servername = "localhost:3306";
				$username = "sanne.krook";
				$password = "complex_WW123!";
				$dbname = "sanne_krook";

				// maakt connectie
				$conn = new mysqli($servername, $username, $password, $dbname);

				// controleert connectie
				if ($conn->connect_error) {
				die ("Connectie mislukt: " .$conn->connect_error);
				}

				if ($conn->query($sql) === TRUE) {
				//echo "Succesvol weggehaald: ".$sql. "<br>";
				} 
				else {
				//echo "Error: " .$sql. "<br>" .$conn -> error. "<br>";
				}
				
				$conn->close();
			}

			function sendQueryInfo($sql) {
				$servername = "localhost:3306";
				$username = "sanne.krook";
				$password = "complex_WW123!";
				$dbname = "sanne_krook";
				
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
			
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
			
				$result = $conn->query($sql);
				
				$conn->close();
				
				return $result;
			}
			
			if (isset($_REQUEST['Operation'])) {
				$operation = $_REQUEST['Operation'];
			} 
			else {
				$operation = "";
			}
			
			$json = array();

			if ($operation == "Lamp aan/uit") {
				$output = "en er was licht";
				$Tijd = "00:00";
				$Check = "FALSE";
				$index = -1;
				if (isset($_REQUEST['Tijd'])) {
					$Tijd = $_REQUEST['Tijd'];
				}
				if (isset($_REQUEST['Check'])) {
					$Check= $_REQUEST['notime'];
				}
				if (isset($_REQUEST['Knop'])) {
					$Knop = $_REQUEST['Knop'];
				}
				
				date_default_timezone_set("Europe/Amsterdam");
				$Tijd = date("H:i:s"); //Override node-red time since it is not up to date
					
			} 
			 else if ($operation == "Status") {
				$result = sendQueryInfo("SELECT * FROM Lampje");
				if ($result->num_rows > 0) {
					$output = "Successful";
					$object = $result->fetch_object();
					$json['Index'] = $object->Lamp;
				} 
				else {
					$output = "No Requests";
				}
			} 
			else if ($operation == "Table") {
				$result = sendQueryInfo("SELECT * FROM Lampje");
				$array = array();
				if ($result->num_rows > 0) {
					$i = 0;
					while($row = $result->fetch_assoc()) {
						$array[$i] = $row;
						$i++;
					}
					$output = "Successful";
					$json['Data'] = $array;
				}
			} 
			else {
				$output = "Operation Not Supported";
			}
			
			
			$json['Response'] = $output;
			echo json_encode($json);
			
		?>
		  
		<div class="container">
			<div class="row text-center">
				<div class="col-12">
					<form method="post">
						<fieldset>
							<legend>on/off status for machine: <?php echo $machine_id; ?></legend>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="customSwitch1"
										name='machine_state' <?php echo $checked_status; ?>>
									<label class="custom-control-label"
										for="customSwitch1">Currently <?php echo $status_str; ?></label>
								</div>
								<input type="hidden" name="form_submit" value="">
							</div>
						</fieldset>
						<input type="submit" class="btn btn-info btn-sm" name="submit" value="Update"/>
					</form>
				</div>
			</div>
		</div>
	</body> 
</html>