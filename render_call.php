<?php
// to change

$url_callback="https://rdi.sb/rendering/render_callback.php"; // change it on the xml  too




$name_projet="example_".time();
$doc = new DOMDocument();


// Definition of the storyboard
$doc->load('video.xml');
$video_storyboard =$doc->saveXML();

// Concat var for Api
$api_key = '1izyY7ReKft5h9EUtvIfQHuDZ' ;

// Definition of the URL to call
//$url="https://api-us.mixerfactory.com/apiRENDER/render";
$url="https://api-eu.mixerfactory.com/apiRENDER/render";




$tab=array();
$tab["APIKEY"]=$api_key;
$tab["codec"]=strtoupper("MP4");
$tab['xml']=$video_storyboard;


// Init the CURL session
$ch = curl_init($url);

// Init CURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_REFERER, 'c.veocdn.com');
//curl_setopt($ch, CURLOPT_REFERER, 'rdi.sb');
curl_setopt($ch, CURLOPT_POSTFIELDS, $tab);

// Method execution
$result = curl_exec($ch);

// Print result
echo $result;
echo '<br>';


?>
