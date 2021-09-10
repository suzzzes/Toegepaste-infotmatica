<html>
  <head>
    <meta http-equiv="refresh" content="30" />
  </head>
  <body>
  <?php

    setlocale(LC_ALL, 'nl_NL' ); //zet de data in het nederlands
    
    echo "Het is vandaag: <br>";
    echo strftime("%A %e %B %Y <br>");
    echo "De tijd is";
    echo date('H:i');
  ?>
  </body>
</html>