<?php
$y = $x  = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["y"])) 
    echo "Y is required";
   else 
    $y = test_input($_POST["y"]);
    
  
  
  if (empty($_POST["x"])) 
    echo "X is required";
   else 
    $x = test_input($_POST["x"]);
    
  if ($x == $y)
    echo "Even groot";
  else if($y <= $x)
    echo "x is Groter";
  else if($x <= $y)
    echo "y is groter";
  else
    echo "Could not compile";   
}
function test_input($data) {
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