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
$fd = fopen("opdr6/namen.txt","r");
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
	$fd2 = fopen("opdr6/adressen.txt","r");
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

if (getenv('HTTP_X_FORWARDED_FOR')){ 
  $ip = getenv('HTTP_X_FORWARDED_FOR'); 
} 
else { 
  $ip = getenv('REMOTE_ADDR'); 
} 

$blocked = false;
$blockedips = file_get_contents("opdr6/blocked.txt");
$ips = explode(";", $blockedips);
for ($x = 0; $x < count($ips); $x++) {
	if ($ip == $ips[$x]) {
		$blocked = true;
		break;
	}
}

$counter = file_get_contents("opdr6/counter.txt");
if (!$blocked) {
	$counter++;
	file_put_contents("opdr6/counter.txt", $counter);
}

function converteer($c){
	settype($c,"integer");
	settype($c,"string");

	for ($x = 0; $x < strlen($c); $x++) {
		echo '<img src="../images/p'.$c[$x].'.gif">';
	}
}
?>
<html>
	<head>
		<title>Opdracht 6</title>
	</head>
	<body>
		<a href="index.php">Ga terug</a></br>
		<h1>Opdracht 6D</h1>
		<form method=post>
		<input type=submit value=zend><br>
		<?php
		echo '<input type=text name="naam0" value="'.$naam0.'"></br>';
		if ($naam0 != "") {
			echo "$naam0 is ";
			if ($gev != 1) echo "niet ";
			echo "in het bestand opgenomen</br>"; 
			
			if ($gev2 == 1) {
				$info = explode(".", $adres0);
				for ($z = 0; $z < count($info); $z++) {
					echo '<input type=text name="" value="'.$info[$z].'"></br>';
				}
			}
		}
		?>
	</form>
    </body>
    </html>