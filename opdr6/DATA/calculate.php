<?php

if (isset($_REQUEST['operation'])) {
	$operation = $_REQUEST['operation'];
} else {
	$operation = "";
}
	
if (isset($_REQUEST['input_1'])) {
	$input_1 = $_REQUEST['input_1'];
} else {
	$input_1 = 0;
}
	
if (isset($_REQUEST['input_2'])) {
	$input_2 = $_REQUEST['input_2'];
} else {
	$input_2 = 0;
}

switch ($operation) {
	case "add":
		$output = "The answer of ".$input_1." + ".$input_2." equals: ".($input_1 + $input_2);
		break;
	case "subtract":
		$output = "The answer of ".$input_1." - ".$input_2." equals: ".($input_1 - $input_2);
		break;
	case "multiply":
		$output = "The answer of ".$input_1." x ".$input_2." equals: ".($input_1 * $input_2);
		break;
	case "devide":
		$output = "The answer of ".$input_1." / ".$input_2." equals: ".($input_1 / $input_2);
		break;
	case "square_root":
		$output = "The square root of ".$input_1." equals: ".sqrt($input_1);
		break;
	case "square":
		$output = "The square of ".$input_1." equals: ".pow($input_1, 2);
		break;
	case "factorial":
		$output = "The factorial of ".$input_1." equals: ".gmp_fact($input_1);
		break;
	default:
		$output = "Error, unable to perform opperation";
		break;
}


$json = array();
$json['output'] = $output;
echo json_encode($json);

?>