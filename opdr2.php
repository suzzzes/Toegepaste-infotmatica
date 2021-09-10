<html>
  <head>
    <title>Control Structures</title>
  </head>
  <body>
  <?php
    for ($a=0;$a<10;$a++){
      echo "A heeft nu de waarde ".$a;
      
      if ($a==4) 
        echo "<hr>";
      else
        echo "<br>";
    }
  ?>
  </body>
</html>