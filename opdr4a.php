<html>
<head>
<title>Strings</title>
</head>
<body bgcolor="#FFFFFF">
<?php
$tekst="abcdefghijklmnopqrstuvwxyz";
echo "De tekst is :".$tekst."<br>";
echo "De lengte van de tekst ".$tekst." is :".strlen($tekst)." karakters.<br>";
echo "De tekst uvw staat op positie ".strpos($tekst,"uvw")."<br>";
echo "In de tekst uvw wordt vervangen door UVW ".str_replace("uvw","UVW",$tekst)."<br>";
echo "Uit de tekst wordt een deel genomen van positie 5, 10 karakters ->  ".substr($tekst,5,10)."<br>";
echo "De karkaters van ascii 97 t/m 122 is : ";
for ($x=97;$x<122;$x++) //de waardes in ascii voor a-z
   echo chr($x);
echo "<br>";
?>

</body>
</html>