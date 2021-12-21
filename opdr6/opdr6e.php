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

if (!empty($_POST['ipadres'])) {
	$blockedips = $blockedips.';'.$_POST['ipadres'];
	file_put_contents("DATA/blocked.txt", $blockedips);
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
		<h1>Opdr6e</h1>
		<form method= "post">
			ipadres: <input type="nummer" size="5" name="ipadres" value="<?php echo $ipadres;?> "> 
			<input type="submit">
		

			<?php

			echo $ip."<br>";
			
			converteer($counter);
			
			?>
		</form>
		
	</body>
</html>