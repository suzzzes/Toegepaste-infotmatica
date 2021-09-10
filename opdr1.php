

<html>
    <head>
        <title>loop variable</title>
    </head>
    <body>
        <?php

        $tekst = "Sannie";
        for ($i=0; $i<8; $i++)
        if ($i %2 == 0)             //als je i deelt door twee is hij niet dik gedrukt.
        
            echo " <font size= $i> $tekst </font>";
        else

            echo " <strong> <font size= $i> $tekst </font> </strong>";
           
        ?>
    </body>
</html>