<?php

$button="Zend";
if (array_key_exists('tekst',$_REQUEST))
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