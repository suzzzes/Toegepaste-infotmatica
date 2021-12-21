<?php
ob_start();
session_start();

if (isset($_POST['logout'])) {
	unset($_SESSION['valid']);
	session_destroy();
}

$data = file_get_contents("DATA/login.txt");
$users = explode(";", $data);

if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$username = $_POST['username'];
	$password = hash('ripemd160', $_POST['password']);
	$exists = false;
	for ($i = 0; $i < count($users); $i++) {
		$info = explode(":", $users[$i]);
		if ($username == $info[0]) {
			$exists = true;
			if ($password == $info[1]) {
				$_SESSION['valid'] = true;
				$_SESSION['timeout'] = time();
				$_SESSION['username'] = $_POST['username'];
				echo "Correcte gegevens <br>";
			} 
			else {
				echo "Incorrect wachtwoord <br>";
			}
			break;
		}
	}
	if (!$exists) {
		echo "Deze gebruikersnaam bestaat niet <br>";
	}
} else if (isset($_POST['new']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$valid = true;
	for ($i = 0; $i < count($users); $i++) {
		$info = explode(":", $users[$i]);
		if ($_POST['username'] == $info[0]) {
			$valid = false;
			echo "Uw gebruikersnaam is al in gebruik <br>";
			break;
		}
	}
	if ($valid) {
		$_SESSION['valid'] = true;
		$_SESSION['timeout'] = time();
		$_SESSION['username'] = $_POST['username'];
		$password = hash('ripemd160', $_POST['password']);
		$data = $data.";".$_POST['username'].":".$password;
		file_put_contents("DATA/login.txt", $data);
	}
}

?>

<html> 
	<head> 
		<title>Opdracht 7</title>
	</head> 
	<body>
		<h1>Opdr 7a</h1>
		<?php 
		if ($_SESSION['valid']) {
			echo 'Gebruiker: '.$_SESSION['username'].' is ingeloged';
			echo '<form method="post">';
			echo '<input type="submit" name="logout" value="Logout"/>';
			echo '</form>';
		} 
		else {
			echo 'Voer uw gegevens in:<br>';
			echo '<form name=aanmelden method="post">';
			echo "Gebruikersnaam: ";
			echo '<input type="text" name="username" value="" required> <br>';
			echo "Wachtwoord: ";
			echo '<input type="password" name="password" required> <br>';
			echo '<input type="submit" value="Login" name="login">';
			echo '<input type="submit" value="New" name="new">';
			echo '</form>';
		}
		?>
		
	</body> 
</html>