<?php
if (array_key_exists('tekst',$_REQUEST))
	$tekst=$_REQUEST['tekst'];
else
	$tekst="";
    preg_replace('/[0-9]/', '', $tekst);

?>
<html>
<head>
<title>Type conversie</title>
</head>
<body bgcolor="#FFFFFF">
<form method="post" >
    <p><input type="text" size="20" name="tekst" value="<?php echo $tekst; ?>"><br>
    <input type="submit" name="start" value="zend"></p>
</form>
</body>
</html>