<html>
    <head>
        <title>loop variable</title>
    </head>
    <body>
        <?php

        $tekst = "Sannie";
        for ($i=0; $i<8; $i++)
        if ($i %2 == 0)
        
            echo " <font size= $i> $tekst </font>";
        else

            echo " <strong> <font size= $i> $tekst </font> </strong>";
           
        ?>
    </body>
</html>