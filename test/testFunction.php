<?php
function var_dump_to_file($var,$fName="log.txt"){
	ob_start();
	var_dump($var);
	$output=ob_get_clean();
	file_put_contents($fName,$output);
}