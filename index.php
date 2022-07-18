<?php
require_once './vendor/autoload.php';

use Fynda\SrMetaExtractor\SrMetaExtractor;


try {
    $me = new SrMetaExtractor();
    $me->setSearchEngine();// default search engin is google.com
    $data = $me->search(["top hosting websites", "best trading websites"]);

    foreach ($data as $keywords) {
        foreach ($keywords as $sResult) {
            echo $sResult->title  . "</br>";
        }
    }

} catch (\Exception $ex) {
    echo $ex->getMessage();
}

