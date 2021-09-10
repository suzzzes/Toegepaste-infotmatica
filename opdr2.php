<html>
  <head>
    <meta http-equiv="refresh" content="30" />
  </head>
  <body>
  <?php

    setlocale(LC_ALL, 'nl_NL' ); //zet de data in het nederlands
    
    echo "Het is vandaag:";
    echo strftime('M d, Y');
    echo date('H:i:s');
  ?>
  </body>
</html>