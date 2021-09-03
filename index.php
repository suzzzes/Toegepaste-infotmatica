<html>
    <head>
        <title>loop variable</title>
    </head>
    <body>
        <?php

        $tekst = "sannie";
        for ($i=0; $i<31; $i++;)
        if ($i %2 == 2)
        
            echo " <font size= $i> $tekst </font>";
        else

            echo " <strong> <font size= $i> $tekst </font> </strong>";
           


        ?>
    </body>
</html>