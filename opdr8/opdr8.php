<html> 
	<head> 
		<title>Opdracht 8</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
		function writeXMLDoc(){
			var xmlhttp;
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("write").innerHTML = xmlhttp.responseText;
				}
			}

			xmlhttp.open("GET", "DATA/ajaxput.php?t=" + Math.random(), true);
			xmlhttp.send();
		}
		
		function loadXMLDoc() {
			var xmlhttp;
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp = new XMLHttpRequest();
			} else {// code for IE6, IE5
			  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			  
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("read").innerHTML = xmlhttp.responseText;
				}
			}
			//+ Math.random() erbij om de link uniek te maken ivm met caching
			xmlhttp.open("GET", "DATA/ajax.txt?t=" + Math.random(), true);
			xmlhttp.send();
		}
		
		$(document).ready(function () {
			$("select[name='operation']").on("change", function(){
				if ($('#operation').val() == "square_root" || $('#operation').val() == "square" || $('#operation').val() == "factorial") {
					$("input#input_2").hide();
				} else {
					$("input#input_2").show();
				}
			});

			$('#form').on('submit', function (e) {
				e.preventDefault();
				$.ajax({
					url: $(this).attr('action'),
					type: "POST",
					dataType: 'json',
					encode: true,
					data: $(this).serialize(),
					
					success: function (json) {
						if (json) {
							console.log(json);
						}
						document.getElementById('output').innerHTML = json.output;
					},
					error: function (jXHR, textStatus, errorThrown) {
						alert(errorThrown);
					}
				});
			});
		});
		</script>
	</head> 
	<body>
		<p id="klok"></p>
		<script>
			var myVar = setInterval(function(){myTimer()}, 1000);

			function myTimer() {
				var d = new Date();
				document.getElementById("klok").innerHTML = d.toLocaleTimeString();
			}
		</script>
		
		<button type="button" onclick="writeXMLDoc()">Schrijf Data</button>
		<h4>Verhoog de teller met 1. <div id="write"></div></h4>
		
		<button type="button" onclick="loadXMLDoc()">Lees Data</button>
		<h4>Inhoud van de teller is : <div id="read">??????</div></h4>
		
		<h1>Lets calculate!</h1>
		<form id="form" action="DATA/calculate.php" method="POST" enctype="multipart/form-data">
			<select id="operation" name="operation">
				<option value="add">Add</option>
				<option value="subtract">Subtract</option>
				<option value="multiply">Multiply</option>
				<option value="devide">Devide</option>
				<option value="square_root">Square Root</option>
				<option value="square">Square</option>
				<option value="factorial">Factorial</option>
			</select>
			<input id="input_1" type="text" name="input_1" value="" required>
			<input id="input_2" type="text" name="input_2" value="" required>
			<input type="submit" value="Calculate!">
		</form>
		<p id="output"></p>
		
	</body> 
</html>