<?php

function array2xml($array, $xml = false){
	if ($xml === false){
		$keys  = array_keys($array);
		$key = $keys[0];
		$xml = new SimpleXMLElement('<'.$key.'/>');
		$array = $array[$key];
	}
	
	foreach($array as $key => $value){
		if (is_array($value)){
			$key = processKey($key);
			array2xml($value, $xml->addChild($key));
		} else{
			$key = processKey($key);
			$xml->addChild($key, $value);
		}
	}
	
	return $xml;
}
	
function processKey($key) {
	if (is_int($key)) {
		$key = 'a' . $key;
	} else {
		$key = str_replace(" ", "_", $key);
	}
	
	return $key; 
}
	
function getJson($url) {
	//Start the Curl session
	$ch = curl_init($url);
	$headers = array(
		"Content-Type: text/plain"
	);
	
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	// Make the call
	$response = curl_exec($ch);
	
	/* Check for 404 (file not found). */
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($httpCode == 404) {
	    //$response = "";
	}
	

	
	$array = json_decode($response, true);
	
	$result_object = new SimpleXMLElement('<result/>');;
	
	if (count($array) > 1) {
		 $result_object = array2xml(array("result" => $array));
	} else {
		 $result_object = array2xml($array);
	}
	
	$dom_result_object = dom_import_simplexml($result_object);
	$result = new DOMDocument();
	$dom_result_object = $result->importNode($dom_result_object, true);
	$dom_result_object = $result->appendChild($dom_result_object);
	
	return $result;
		
	curl_close($ch);
}

?>
