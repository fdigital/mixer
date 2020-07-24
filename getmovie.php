<?php	// Definition of variables (change)

	if (isset($_GET['moovieId'])) {
		$moovie_id = $_GET['moovieId'];
	} else {
		$moovie_id = "0";
	}
	const API_KEY = "1izyY7ReKft5h9EUtvIfQHuDZ" ;
	// Creation of the object that contains parameters to pass
	$postfields = array();
	 $postfields["moovieId"] = $moovie_id;
	 //$postfields["mediaId"] = $media_id;
	 $postfields["APIKEY"] = API_KEY;

	// Definition of the URL to call
	//$url="http://api.api-video.com/apiRENDER/get_moovie";
	$url="https://api-eu.mixerfactory.com/apiRENDER/get_moovie";
	// Init the CURL session
	$ch = curl_init($url);
	// Init CURL options
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_REFERER, 'rdi.sb'); // change
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
	// Recovery of data returned by the API
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// Method execution
	$result = urldecode(curl_exec($ch));
	// Close CURL session
	curl_close($ch);
	// Print result
	echo $result;
?>