<html> 
	<head> 
		<title>Opdracht 10</title>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head> 
	<body>
		
		<?php
			echo "Verwijder Data: <br>";
			sendQuery ("DELETE FROM iets ");
			echo "Voeg Data toe: <br>";
			sendQuery ("INSERT INTO `iets` (`Fruit`, `Groente`, `Vlees`, `Extra`, `Recept`) VALUES ('Banaan', 'Nasi groentepakket', 'Kip', 'Pinda', 'Nasi')");
			sendQuery ("INSERT INTO `iets` (`Fruit`, `Groente`, `Vlees`, `Extra`, `Recept`) VALUES ('Peer', 'Spruiten', 'Filetlapje', 'Rijst', 'Spruitjes');");
			sendQuery ("INSERT INTO `iets` (`Fruit`, `Groente`, `Vlees`, `Extra`, `Recept`) VALUES ('Aardbeien', 'Sperziebonen', 'Vega vlees', 'krieltjes', 'Vega sperziebonen');");
			echo "Pas Data aan: <br>";
			sendQuery ("UPDATE iets SET Groente = 'Nasigroenten' WHERE Groente = 'Nasi groentepakket'");
			sendQuery ("UPDATE iets SET Extra = 'Aardappels' WHERE Fruit = 'Peer'");
			echo "Sorteer tabel op fruit: <br>";
			sortTable ("Fruit");
			echo "Sorteer tabel op groente: <br>";
			sortTable ("Groente");
			echo "Select Vlees: <br>";
			select ("Vlees");
			echo "Select Groente: <br>";
			select ("Groente");

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
				  echo "Succesvol weggehaald: ".$sql. "<br>";
				} 
                else {
				  echo "Error: " .$sql. "<br>" .$conn -> error. "<br>";
				}
				
				$conn->close();
			}
			
			function sortTable($sort) {
				$servername = "localhost:3306";
				$username = "sanne.krook";
				$password = "complex_WW123!";
				$dbname = "sanne_krook";

				// maakt connectie
				$conn = new mysqli($servername, $username, $password, $dbname);

				// controleert de conectie 
				if ($conn->connect_error) {
				  die ("Connectie mislukt: ".$conn -> connect_error);
				}

				$sql = "SELECT Groente, Vlees, Extra FROM iets ORDER BY ".$sort;
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  // output data van elke rij
				  while ($row = $result->fetch_assoc()) {
					echo "Groente: " . $row["Groente"]. " - Vlees: " . $row["Vlees"]. " " . $row["Extra"]. "<br>";
				  }
				} 
                else {
				  echo "geen resultaten";
				}
				$conn->close();
			}
			
			function select($select) {
				$servername = "localhost:3306";
				$username = "sanne.krook";
				$password = "complex_WW123!";
				$dbname = "sanne_krook";

				// maakt connectie
				$conn = new mysqli($servername, $username, $password, $dbname);

				// controleert connectie
				if ($conn->connect_error) {
				  die ("Connectie mislukt: ".$conn -> connect_error);
				}
				
				$sql = "SELECT ".$select." FROM iets";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  // output data van elke rij

				  while ($row = $result->fetch_assoc()) {
					echo $row[$select]. "<br>";
				  }
				} 
                else {
				  echo "geen resultaten";
				}
				

				$conn -> close();
			}
		?>
		
	</body> 
</html>