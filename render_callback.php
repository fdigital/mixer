<?php


/////////////////////////////////////////////////////////////////////
$tab=array();
$tab["APIKEY"]="1izyY7ReKft5h9EUtvIfQHuDZ";

$tab["moovieId"]=$_REQUEST['id'];


///////////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url="https://api-eu.mixerfactory.com/apiRENDER/get_moovie");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_REFERER, 'c.veocdn.com');
curl_setopt($ch, CURLOPT_REFERER, 'rdi.sb');
curl_setopt($ch, CURLOPT_POSTFIELDS, $tab);
$output = curl_exec($ch);

// write log
print_r($output);
$data = simplexml_load_string($output);
$fp = fopen('log/log__'.$tab["moovieId"].'_retour.txt', 'w');
fwrite($fp,$tab["moovieId"].'  _____________  '.$_REQUEST['error'].'   _______ ');
fwrite($fp, urldecode($data->message));
fwrite($fp,  "\r\n".'-------------------------------');
fwrite($fp, $output);
fclose($fp);

/// download location
// $FILETMP = '/home/XXXXXXXXXXXXXXXXXXXXXXXXX/example/output/video_'.$tab["moovieId"].'.mp4';
$FILETMP = '/output/video_'.$tab["moovieId"].'.mp4';

/// start download
$wget = 'wget "'.urldecode($data->message).'"  --output-document '.$FILETMP;
shell_exec ($wget);








?>