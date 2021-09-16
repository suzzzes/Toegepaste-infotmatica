<html>
<head>
<title>Strings</title>
</head>
<body bgcolor="#FFFFFF">

<?php

// generate array with the characters from the alphabet 
// A to Z
$alphabet = range("a", "z");
        
// Iterate over every character and create a directory with the name of the current character
foreach($alphabet as $character){
    mkdir("./" . $character);
}


echo "De tekst is :".$character."<br>";
echo "De lengte van de tekst ".$character." is :".strlen($character)." karakters.<br>";
echo "De tekst uvw staat op positie ".strpos($character,"uvw")."<br>";
echo "In de tekst uvw wordt vervangen door UVW ".str_replace("uvw","UVW",$character)."<br>";
echo "Uit de tekst wordt een deel genomen van positie 5, 10 karakters ->  ".substr($character,5,10)."<br>";
echo "De karkaters van ascii 48 t/m 57 is : ";
for ($x=48;$x<58;$x++)
   echo chr($x);
echo "<br>";
?>

</body>
</html>