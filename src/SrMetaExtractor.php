<?php

namespace FYNDA\SrMetaExtractor;

class SrMetaExtractor
{

    private $searchEngine;


    public function setSearchEngine($engine = "google.com")
    {
        $this->searchEngine=$engine;
    }

    public function search(array $keywords){
//        for each loop for keywords array
        $query=urlencode($keywords);
        $url = 'https://'.$this->searchEngine.'/search?q='.$query;
        $scrape = file_get_contents($url);
    }
}