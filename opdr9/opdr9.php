<html> 
	<head> 
		<title>Opdracht 9</title>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type = "text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type = "text/javascript">
			google.charts.load ('current', {'packages':['corechart']}); // laat libarys in
			google.charts.setOnLoadCallback (loadData); // wacht tot geladen is, voordat de data erin gezet wordt

			var data1;
			var data2;
			var data3;
			
			var options = {
			  title: 'Sannes koekjes verkoop',
			  curveType: 'function',
			  legend: { position: 'bottom' }
			};
				
			function loadData() { // functie die data uit drie losse documenten haalt.
				$.ajax ({
					url: "https://sanne.krook.sites.nhlstenden.com/opdr9/DATA/data1.txt",
					dataType: 'text',
					type: 'Get',
					async: true,
					success: function (response) {
						console.log (response)
						data1 = new google.visualization.DataTable();

						data1.addColumn ('string', 'Jaar');
						data1.addColumn ('number', 'Verkockt');
						data1.addColumn ('number', 'Ingekockt');
						const textdata = response.split (";");

						for (var i = 0; i < textdata.length; i++) {
							const text = textdata[i].split (",");
							data1.addRow ([text[0], parseInt (text[1]), parseInt (text[2])]);
						}
					}
				});

				$.ajax ({
					url: "https://sanne.krook.sites.nhlstenden.com/opdr9/DATA/data2.txt",
					dataType: 'text',
					type: 'Get',
					async: true,
					success: function (response) {
						console.log (response)
						data2 = new google.visualization.DataTable();

						data2.addColumn ('string', 'Jaar');
						data2.addColumn ('number', 'Verkockt');
						data2.addColumn ('number', 'Ingekockt');
						const textdata = response.split (";");

						for (var i = 0; i < textdata.length; i++) {
							const text = textdata[i].split (",");
							data2.addRow ([text[0], parseInt (text[1]), parseInt (text[2])]);
						}
					}
				});

				$.ajax ({
					url: "https://sanne.krook.sites.nhlstenden.com/opdr9/DATA/data3.txt",
					dataType: 'text',
					type: 'Get',
					async: true,
					success: function (response) {
						console.log (response)
						data3 = new google.visualization.DataTable();

						data3.addColumn ('string', 'Jaar');
						data3.addColumn ('number', 'Verkocht');
						data3.addColumn ('number', 'Ingekocht');
						const textdata = response.split (";");

						for (var i = 0; i < textdata.length; i++) {
							const text = textdata[i].split (",");
							data3.addRow ([text[0], parseInt (text[1]), parseInt (text[2])]);
						}
					}
				});
			}
			
			function lineChart (data) {
				var chart = new google.visualization.LineChart (document.getElementById ('curve_chart'));
				chart.draw (data, options);
			}
			
			function pieChart (data) {
				var chart = new google.visualization.PieChart (document.getElementById ('curve_chart'));
				chart.draw (data, options);
			}
			
			function columnChart (data) {
				var chart = new google.visualization.ColumnChart (document.getElementById ('curve_chart'));
				chart.draw (data, options);
			}
			
			$(document).ready (function () {
				
				$('#form').on ('submit', function (e) {
					e.preventDefault();
					
					var data;
					if ($('#dataSelect').val() == "1") {
						data = data1;
					} 
					else if ($('#dataSelect').val() == "2") {
						data = data2;
					} 
					else if ($('#dataSelect').val() == "3") {
						data = data3;
					}
					
					if ($('#chartSelect').val() == "lijn") {
						lineChart (data);
					} 
					else if ($('#chartSelect').val() == "taart") {
						pieChart (data);
					} 
					else if ($('#chartSelect').val() == "staaf") {
						columnChart (data);
					}
					
					
				});
			});
		</script>
	</head> 
	<body>
		<h1>Opdracht 9</h1>
		<form id = "form" name = Data method = "post">
			<select id = "chartSelect" name = "calculate">
				<option value ="lijn">Lijngrafiek</option>
				<option value ="taart">Taartgrafiek</option>
				<option value ="staaf">Staafgrafiek</option>
			</select>
			<select id="dataSelect" name = "ff">
				<option value = "1">File_1</option>
				<option value = "2">File_2</option>
				<option value = "3">File_3</option>
			</select>
			<input type = "submit" value = "Show!" name = "sub">
		</form>
		<div id = "curve_chart" style = "width: 900px; height: 500px"></div>
	</body> 
</html>