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

        foreach($keywords as $keyword){

            $query=urlencode($keyword);
            curl_setopt($curl, CURLOPT_URL, 'https://'.$this->searchEngine.'/search?q='.$query);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $resp = curl_exec($curl);
            array_push($this->resultCollection,$resp);
        }

        curl_close($curl);

        return $this->resultCollection;
    }






}


//Notes
// $scrape = file_get_contents($url);
//$url = 'https://'.$this->searchEngine.'/search?q='.$query;