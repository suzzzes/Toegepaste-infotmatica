<?php
if (array_key_exists('sep1',$_REQUEST))
	$sep1=$_REQUEST['sep1'];
else
	$sep1=",";
if (array_key_exists('sep2',$_REQUEST))
	$sep2=$_REQUEST['sep2'];
else
	$sep2=".";
if (array_key_exists('tekst',$_REQUEST))
	$tekst=$_REQUEST['tekst'];
else
	$tekst1="";

if (array_key_exists('sep3',$_REQUEST))
	$sep3=$_REQUEST['sep3'];
else
	$sep3=",";
if (array_key_exists('sep4',$_REQUEST))
	$sep4=$_REQUEST['sep4'];
else
	$sep4=".";
if (array_key_exists('tekst1',$_REQUEST))
	$tekst1=$_REQUEST['tekst1'];
else
	$tekst1="";
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
if ($tekst=="") $tekst="123,456,789.abc,def,ghi";
if ($sep1=="") $sep1=",";
if ($sep2=="") $sep2=".";

if (!isset($tekst1)) $tekst1=$_POST['tekst'];
if (strlen($tekst1)>0){
  echo "<table border=3><tr>"."\n";
  $tabel3= explode ($sep3,$tekst1);
  for ($y=0;$y<count($tabel3);$y++){
    $tabel4=explode($sep3,$tabel4[$y]);
      for ($x=0;$x<count($tabel4);$x++)
          echo "<td>".$tabel4[$x]."</td>";
      echo "</tr><tr>";
     }
     echo "</table>";
}
if ($tekst1=="") $tekst1="abc,def,789.abc,123,456";
if ($sep3=="") $sep3=",";
if ($sep4=="") $sep4=".";
?>

<form method="post" >
<p><input type="text" size="50" name="tekst" value="<?php echo $tekst; ?>"><br>
<input type="text" size="1" name="sep1" value="<?php echo $sep1; ?>"><br>
<input type="text" size="1" name="sep2" value="<?php echo $sep2; ?>"><br>
<input type="text" size="50" name="tekst" value="<?php echo $tekst1; ?>"><br>
<input type="text" size="1" name="sep1" value="<?php echo $sep3; ?>"><br>
<input type="text" size="1" name="sep2" value="<?php echo $sep4; ?>"><br>
<input type="submit" name="start" value="zend"></p>
</form>
</body>
</html>