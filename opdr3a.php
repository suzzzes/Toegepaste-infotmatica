<?php

$button="Zend";
if (array_key_exists('tekst',$_REQUEST)) // kijkt of er tekst staat in de variable
	$tekst=$_REQUEST['tekst'];
else
	$tekst="";

?>
<html>
<head>
<title>Type conversie</title>
</head>
<body bgcolor="#FFFFFF">
<form method="post" >
    <p><input type="text" size="20" name="tekst" value="<?php echo preg_replace('/[a-zA-Z]/', '', $tekst); ?>"><br> 
    <input type="submit" name="start" value="<?php if(!empty($tekst))
    		echo preg_replace('/[0-9]/', '', $tekst); 
    		else
    	   echo $button
    	
    ?>"></p>
</form>
</body>
</html>

<?php
    // preg_replace filtert de letters uit de tekst en laat alleen de cijfers over in regel 17
    // in regel 19 kijkt de if statement of het tekstvak leeg is, is deze dat niet dan zet hij hier de ingevoede letters in.
    // is hij dat wel, dan zet hij de variable butten erin
    ?>