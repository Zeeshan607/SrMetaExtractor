<?php

namespace  Fynda\SrMetaExtractor;


use DOMXPath;
use stdClass;

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
                throw new \Exception("Unable to initialize curl");
        }

        foreach($keywords as $kIndex=>$keyword) {
            $finalKeywordResult=[];
            $query = urlencode($keyword);
            curl_setopt($curl, CURLOPT_URL, 'https://www.' . $this->searchEngine . '/search?q=' . $query);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            $resultPage = curl_exec($curl);

            if (curl_errno($curl) || $resultPage == false) {
                throw new \Exception(curl_error($curl));
            }

            $dom = new \DOMDocument();
            @$dom->loadHTML($resultPage);
            $xpath = new DOMXPath($dom);
//            loop for getting promoted sites
            foreach ($xpath->query('//div[@class="uEierd"]//div[@class="Gx5Zad fP1Qef EtOod pkphOe"]') as $key => $pSite) {
                $keywordSearchResult = new stdClass();
                $keywordSearchResult->keyword_name = $keyword;
                $keywordSearchResult->rank = $key;
                $keywordSearchResult->meta = new stdClass();
                foreach ($pSite->childNodes as $node) {

                    if ($node->getAttribute("class") == "v5yQqb jqWpsc" && $node->firstChild->getAttribute("role") == "presentation") {
                        //  url of site
                        $keywordSearchResult->meta->url = $node->firstChild->getAttribute("href");
                        // title of site
                        $keywordSearchResult->meta->title = $xpath->query('a/div[@role="heading"]', $node)->item(0)->textContent;
                        // bool For [Add or normal] site link
                        $keywordSearchResult->meta->promoted = 1;
                    }
                    if ($node->getAttribute('class') == "w1C3Le" && $node->firstChild->getAttribute("class") == "MUxGbd yDYNvb lyLwlc") {
                        $keywordSearchResult->meta->description = $node->firstChild->textContent;
                    }
                }
                array_push($finalKeywordResult, $keywordSearchResult);
            }

//            loop for getting Normal sites
            foreach ($xpath->query('//div[@class="Gx5Zad fP1Qef xpd EtOod pkphOe"]') as $key => $site) {

                $keywordSearchResult = new stdClass();
                $keywordSearchResult->keyword_name = $keyword;
                $keywordSearchResult->rank = $key;
                $keywordSearchResult->meta = new stdClass();
                foreach ($site->childNodes as $node) {

                    if ($node->getAttribute("class") == "egMi0 kCrYT") {
                        //  url of site
                        $keywordSearchResult->meta->url = "www." . $this->searchEngine . $node->firstChild->getAttribute("href");
                        // title of site
                        $keywordSearchResult->meta->title = $xpath->query('a/h3', $node)->item(0)->textContent;
                        // bool For [Add or normal] site link
                        $keywordSearchResult->meta->promoted = 0;
                    }
                    if ($node->getAttribute('class') == "kCrYT") {

                        $keywordSearchResult->meta->description = $xpath->query('*/div[@class="BNeawe s3v9rd AP7Wnd"]', $node)->item(0)->textContent;
                    }
                }
                array_push($finalKeywordResult, $keywordSearchResult);
            }

            $this->resultCollection[$kIndex]=$finalKeywordResult;
        }


        curl_close($curl);

        return $this->resultCollection ;
    }



}

