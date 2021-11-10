<html>
  <head>
    <meta http-equiv="refresh" content="1" /> <!--elke 1 sec verversen. -->
  </head>

  <body>
    <?php
      function int_2_gif($c){
        settype($c,"integer");
        settype($c,"string");

        if (strlen($c) == 1) {
          echo '<img src="gifjes/p0.gif">';
        }

        for ($x = 0; $x < strlen($c); $x++) {
          echo '<img src="gifjes/p'.$c[$x].'.gif">';
        }
      }
  
      setlocale(LC_ALL, 'nl_NL');                     //Deze functie verandert de taal naar het Nederlands.
      date_default_timezone_set('Europe/Amsterdam');  //Deze functie stelt de tijdzone van Nederland in.

      $today = getdate();

      //De datum printen
      echo "Het is vandaag: </br>";     //Print alleen tekst
      echo strftime("%A");              //Print de dag van de week
        int_2_gif($today["mday"]);      //Converteer dag in cijfers
      echo strftime( "</br> %B");              //Print de maand
        int_2_gif($today["year"]);      //Converteer jaar in cijfers

      //De tijd printen 
      echo "</br>De tijd is:</br>";     //Print alleen tekst
        int_2_gif($today["hours"]);     //Converteer het uur
      echo ":";                         //Print :
        int_2_gif($today["minutes"]);   //Converteer minuten
      echo ":";                         //Print :
        int_2_gif($today["seconds"]);   //Converteer seconden
    ?>
  </body>
</html>
