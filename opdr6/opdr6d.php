<?php
if (isset($_REQUEST['naam0']))
	$naam0=$_REQUEST["naam0"];
else
	$naam0="jan";
if (isset($_REQUEST['adres0']))
	$adres0=$_REQUEST["adres0"];
else
	$adres0="";

$gev = 0;
$fd = fopen("DATA/namen.txt","r");
while (!feof($fd) && $gev == 0) {
	$buffer = trim(fgets($fd, 4096));
	$namen = explode(",", $buffer);
	for ($y = 0; $y < count($namen); $y++) {
		if ($naam0 == $namen[$y]) {
			$gev = 1;
			break;
		}
	}
}
fclose($fd);

$gev2 = 0;
if ($gev == 1) {
	$fd2 = fopen("DATA/adressen.txt","r");
	while (!feof($fd2) && $gev2 == 0) {
		$adrbuffer = trim(fgets($fd2, 4096));
		$adressen = explode(",", $adrbuffer);
		for ($x = 0; $x < count($adressen); $x++) {
			$adres = explode(".", $adressen[$x]);
			if ($naam0 == $adres[0]) {
				$adres0 = str_replace($naam0.".", "", $adressen[$x]);
				$gev2 = 1;
				break;
			}
		}
	}
	fclose($fd2);
}


?>
<html>
	<head>
		<title>Opdracht 6</title>
	</head>
	<body>
		<h1>Opdr 6d</h1>
		<form method=post>
		<input type=submit value=zend> <br>
		<?php
		echo '<input type=text name="naam0" value="'.$naam0.'"><br>';
		if ($naam0 != "") {
			echo "$naam0 is ";
			if ($gev != 1) echo "niet ";
			echo "in het bestand opgenomen<br>"; 
			
			if ($gev2 == 1) {
				$info = explode(".", $adres0);
				for ($z = 0; $z < count($info); $z++) {
					echo '<input type=text name="" value="'.$info[$z].'"><br>';
				}
			}
		}
		?>
		</form>

	</body>
</html>