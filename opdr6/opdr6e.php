<?php

if (getenv('HTTP_X_FORWARDED_FOR')){ 
  $ip = getenv('HTTP_X_FORWARDED_FOR'); 
} 
else { 
  $ip = getenv('REMOTE_ADDR'); 
} 

$blocked = false;
$blockedips = file_get_contents("DATA/blocked.txt");
$ips = explode(";", $blockedips);
for ($x = 0; $x < count($ips); $x++) {
	if ($ip == $ips[$x]) {
		$blocked = true;
		break;
	}
}

$counter = file_get_contents("DATA/counter.txt");
if (!$blocked) {
	$counter++;
	file_put_contents("DATA/counter.txt", $counter);
}

function converteer($c){
	settype($c,"integer");
	settype($c,"string");

	for ($x = 0; $x < strlen($c); $x++) {
		echo '<img src="gifjes/p'.$c[$x].'.gif">';
	}
}
?>
<html>
	<head>
		<title>Opdracht 6e</title>
	</head>
	<body>
		<h1>Opdr6e/h1>
		<form method=post>
		<input type=submit value=zend><br>
		<?php

        echo $ip."</br>";
		
		converteer($counter);
		?>
		</form>
		
	</body>
</html>