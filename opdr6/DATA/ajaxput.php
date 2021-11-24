<?php
$f = fopen("ajax.txt",'r'); 
$data = ''; 
$data = fread($f,255); 
fclose($f); 
settype($data, "integer");
$data++;
$f = fopen("ajax.txt",'w'); 
fwrite($f,$data);
fclose($f);
?>