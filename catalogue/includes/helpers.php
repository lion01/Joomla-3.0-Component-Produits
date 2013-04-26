<?php

function render ($template,$vars=array()){

	extract ($vars);

	if (is_array($template)){
	
		foreach ($template as $k){
		
		$cl = strtolower (get_class($k));
		$$cl= $k;
		
		include "Views/_$cl.php";
		}
	
	
	
	}
	
	else {
	
	include "Views/$template.php";
	
	
	}




}