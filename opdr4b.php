<?php
if (array_key_exists('sep1',$_REQUEST))
	$sep1=$_REQUEST['sep1'];
else
	$sep1=",";
if (array_key_exists('sep2',$_REQUEST))
	$sep2=$_REQUEST['sep2'];
else
	$sep2=".";
if (array_key_exists('sep3', $_REQUEST))
    $sep3=$_REQUEST['sep3';];
else
    $sep3=":";
if (array_key_exists('tekst',$_REQUEST))
	$tekst=$_REQUEST['tekst'];
else
	$tekst="";


?>
<html>
<head>
<title>arrays</title>
</head>
<body bgcolor="#FFFFFF">
<?php
if (!isset($tekst)) $tekst=$_POST['tekst'];
if (strlen($tekst)>0){
  echo "<table border=3><tr>"."\n";
  $tabel1= explode ($sep2,$tekst);
  for ($y=0;$y<count($tabel1);$y++){
    $tabel2=explode($sep1,$tabel1[$y]);
      for ($x=0;$x<count($tabel2);$x++)
          echo "<td>".$tabel2[$x]."</td>";
      echo "</tr><tr>";
     }
     echo "</table>";
}
if ($tekst=="") $tekst="123,456,789.abc,def,ghi:123,456,789.abc,def,ghi";
if ($sep1=="") $sep1=",";
if ($sep2=="") $sep2=".";
if ($sep3="") $sep3=":";
?>

<form method="post" >
<p><input type="text" size="50" name="tekst" value="<?php echo $tekst; ?>"><br>
<input type="text" size="1" name="sep1" value="<?php echo $sep1; ?>"><br>
<input type="text" size="1" name="sep2" value="<?php echo $sep2; ?>"><br>
<input type="text" size="1" name="sep3" value="<?php echo $sep3; ?>"><br>
<input type="submit" name="start" value="zend"></p>
</form>
</body>
</html>