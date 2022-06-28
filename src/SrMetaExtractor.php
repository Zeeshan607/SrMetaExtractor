<?php

namespace  Fynda\SrMetaExtractor;


class SrMetaExtractor
{

    private $searchEngine;
    private $resultCollection=[];

    /*
     * setSearchEngine used to set search engine by user
     *
     */
    public function setSearchEngine($engine = "google.com")
    {
        $this->searchEngine=$engine;
    }

    /*
     * search function keywords will be passed in array to search query on specified search engine
     */

    public function search(array $keywords){


        //for each loop for keywords array
        $curl= curl_init();

        if ($curl === false) {
            echo " curl was unable to initiate";
        }

        foreach($keywords as $keyword){
            $query=urlencode($keyword);
            curl_setopt($curl, CURLOPT_URL, 'https://www.'.$this->searchEngine.'/search?q='.$query);
            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            $result= curl_exec($curl);
            array_push($this->resultCollection,$result);
        }
//        $httpReturnCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return json_encode($this->resultCollection);
    }






}


//Notes
// $scrape = file_get_contents($url);
//$url = 'https://'.$this->searchEngine.'/search?q='.$query;