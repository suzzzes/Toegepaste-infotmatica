<?php
class test {
	var $tabel;
	
	function setvar($f) {
		$this -> tabel = $f;
	}
	
	function getvar() {
		return $this -> tabel;
	}
	
	function addend($f) {
		$this -> tabel = $this -> tabel.$f;
	}
	
	function addfront($f) {
		$this -> tabel = $f.$this->tabel;
	}
	
	function display() {
		echo $this -> tabel."<br>";
	}
	
	function clear() {
		$this -> tabel = "";
	}
	
	function replace($f, $r) {
		$this -> tabel = str_replace($f, $r, $this -> tabel);
	}
	
	function length() {
		return strlen($this -> tabel);
	}
	
	function reverse() {
		$this -> tabel = strrev($this -> tabel);
	}
	
	function countChar($f) {
		return substr_count($this -> tabel, $f);
	}
	
	function stringPos($f) {
		return strpos($this -> tabel, $f);
	}
	
	function uppercase() {
		$this -> tabel = strtoupper($this -> tabel);
	}
	
	function lowercase() {
		$this -> tabel = strtolower($this -> tabel);
	}

	function concat($f) {
		$this -> tabel = $this -> tabel.$f;
	}
	
	function midstr($c) {
		$half = ($this -> length() / 2) - ($c / 2);
		
		return substr($this -> tabel, $half, $c);
	}
}
?>

<html> 
	<head> 
		<title>Opdracht 7</title>
	</head> 
	<body>
		<h1>Opdr7b</h1>
		<?php
		$r = new test;
		$r -> setvar("abc");
		$v = $r -> getvar();
		echo $v."<br>";

		$r -> addend("-einde");
		$r -> addfront("begin-");
		$r -> display();
		
		echo "clear: ";
		$r -> clear();
		$r -> display();
		echo "new value: ";
		$r -> setvar("Elektrotest");
		$r -> display();
		echo "replace: ";
		$r -> replace("test", "techniek");
		$r -> display();
		echo "length: ".$r -> length()."</br>";
		echo "reverse: ";
		$r -> reverse();
		$r -> display();
		echo "undo reverse: ";
		$r -> reverse();
		$r -> display();
		echo "count of t: ".$r -> countChar("t")."</br>";
		echo "str pos of techniek: ".$r -> stringPos("techniek")."</br>";
		echo "upper: ";
		$r -> uppercase();
		$r -> display();
		echo "lower: ";
		$r -> lowercase();
		$r -> display();
		echo "concat: ";
		$r -> concat(" jaar 4");
		$r -> display();
		echo "midstr 2: ".$r -> midstr('2')."</br>";
		echo "midstr 3: ".$r -> midstr('3')."</br>";
		echo "midstr 4: ".$r -> midstr('4')."</br>";
		echo "midstr 5: ".$r -> midstr('5')."</br>";
		?>
	</body> 
</html>