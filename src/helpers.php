
<?php 

function dump($result, $die = FALSE) {
	if($die == true) {
		var_dump($result);
		die();
	} else {
		var_dump($result);
	}
}

/*
arrayResolver returns the matched value
by Min Thet Naing
refined by Sitt Min Maw and Satt Kyar
*/
function arrayResolver($request_array, $default_array) {
	$key = explode('.', $request_array[0]);

	foreach ($key as $k => $value) {
		if(array_key_exists($value, $default_array)) {
			$default_array = $default_array[$value];
		} else {
			trigger_error('Array key doesn\'s exist.', E_USER_ERROR);
		}	
	}
	return $default_array;    
}
 ?>