<?php
  if (array_key_exists('email',$_REQUEST) & array_key_exists('internet',$_REQUEST))    {        //Deze functie haalt de gegevens uit de tekstboxen
	$email=$_REQUEST['email'];
    $internet=$_REQUEST['internet'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {    //Deze functie controleert of het email adres geldig is
        echo "Geldige email <br>";
    }
    else{
        echo "Niet geldige email <br>";
    }
    
    //if (array_key_exists('internet',$_REQUEST))         //Deze functie haalt de gegevens uit de tekstbox
    //    $internet=$_REQUEST['internet'];
    
    if (filter_var($internet, FILTER_VALIDATE_URL)) {   //Deze functie controleert of de url wel geldig is
        echo "Geldige URL <br>";
    }
    else{
        echo "Niet geldige URL <br>";
    }
  }
?>

<html>
  <head>
    <title>Opdracht 4c</title>
  </head>
  <body>

    <form>
      <input type="text" name="email" placeholder="e-mailadres" value="<?php echo $email?>">
      <input type="text" name="internet" placeholder="Webadres" value="<?php echo $internet?>">
      <input type="submit"value ="zend">
    </form>

  </body>
</html>

