<?php
require_once './vendor/autoload.php';

use Fynda\SrMetaExtractor\SrMetaExtractor;

//
//try{
//    $me= new SrMetaExtractor();
//    $me->setSearchEngine();
// echo $me->search("top trading sites");
//
//}catch (\Exception $ex){
//    echo $ex->getMessage();
//}
$curl= curl_init();

if ($curl === false) {
    echo " curl was unable to initiate";
}
$query=urlencode("latest news");

curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/search?q='.$query);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$resp = curl_exec($curl);

$httpReturnCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);
echo $resp;
//echo file_get_contents('http://www.google.com/search?q='.$query);