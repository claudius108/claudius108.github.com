<?php

function getXml($url) {
	// start the Curl session
	$ch = curl_init($url);
	
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	// make the call
	$response = curl_exec($ch);
	
	// check for 404 (file not found)
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($httpCode == 404) {
	    //$response = "";
	}
	
	$result = new DOMDocument();
	$result->loadXML($response);
	
	return $result;
	
	curl_close($ch);
}
?>
