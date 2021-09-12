<?php
$y = $x  = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {   // kijken of er tekst staat in de variable
  if (empty($_POST["y"])) 
    echo "Vul Y in";
   else 
    $y = test_input($_POST["y"]);
    
  
  
  if (empty($_POST["x"])) 
    echo "Vul X in";
   else 
    $x = test_input($_POST["x"]);
    
  if ($x == $y)                             // x en y vergelijken of ze gelijk aan elkaar zijn
    echo "Even groot";
  else if($y <= $x)
    echo "x is groter";                     // kijken of x groter is
  else if($x <= $y)
    echo "y is groter";                     // kijken of y groter is
  else
    echo "error";   
}
function test_input($data) {                // functie om te kijken of er data is
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<html>
  <head>
    <title>Opdracht c</title>
  </head>
  <body>
    <form method="post">
     x:<input type="nummer" size="5" name="x" value="<?php echo $x;?>">
      y:<input type="nummer" size="5" name="y" value="<?php echo $y;?>">
      <input type="submit" value="zend">
    </form>
  </body>
</html>