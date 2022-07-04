<?php

namespace Fynda\SrMetaExtractor;


use DOMXPath;
use stdClass;

class SrMetaExtractor
{

    private $searchEngine;
    private $resultCollection = [];

    /*
     * setSearchEngine used to set search engine by user
     *
     */
    public function setSearchEngine($engine = "google.com")
    {
        $this->searchEngine = $engine;
    }

    /*
     * search function keywords will be passed in array to search query on specified search engine
     */

    public function search(array $keywords)
    {


        //  initiating curl and checking for error;
        $curl = curl_init();
        if ($curl === false) {
            throw new \Exception("Unable to initialize curl");
        }

        //for each loop for keywords array
        foreach ($keywords as $kIndex => $keyword) {

            $keywordFinalResult = [];//array for storing results for single keyword
            $query = urlencode($keyword);
            curl_setopt($curl, CURLOPT_URL, 'https://www.' . $this->searchEngine . '/search?q=' . $query);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            $resultPage = curl_exec($curl);
            //checking for curl_exec  output errors
            if (curl_errno($curl) || $resultPage == false) {
                throw new \Exception(curl_error($curl));
            }
            // initiating DOMDocument
            $dom = new \DOMDocument();
            @$dom->loadHTML($resultPage);
            //initiating DOMXPath
            $xpath = new DOMXPath($dom);
//            loop for getting promoted sites
            foreach ($xpath->query('//div[@class="uEierd"]//div[@class="Gx5Zad fP1Qef EtOod pkphOe"]') as $key => $pSite) {
                // creating object for single result
                $keywordSearchResult = new stdClass();
                $keywordSearchResult->keyword_name = $keyword;
                $keywordSearchResult->rank = $key;
                // creating nested object named meta for metadata separation
                $keywordSearchResult->meta = new stdClass();
                //foreach loop for mapping child nodes of current promoted site block
                foreach ($pSite->childNodes as $node) {
                    // if condition for getting result's title, link and promoted status
                    if ($node->getAttribute("class") == "v5yQqb jqWpsc" && $node->firstChild->getAttribute("role") == "presentation") {
                        //  url of site
                        $keywordSearchResult->meta->url = $node->firstChild->getAttribute("href");
                        // title of site
                        $keywordSearchResult->meta->title = $xpath->query('a/div[@role="heading"]', $node)->item(0)->textContent;
                        // bool For [Add or normal] site link
                        $keywordSearchResult->meta->promoted = 1;
                    }
                    // if condition for getting description of promoted site
                    if ($node->getAttribute('class') == "w1C3Le" && $node->firstChild->getAttribute("class") == "MUxGbd yDYNvb lyLwlc") {
                        $keywordSearchResult->meta->description = $node->firstChild->textContent;
                    }
                }
                // pushing promoted sites data object into $keywordFinalResult array
                array_push($keywordFinalResult, $keywordSearchResult);
            }

//            loop for getting Normal sites
            foreach ($xpath->query('//div[@class="Gx5Zad fP1Qef xpd EtOod pkphOe"]') as $key => $site) {
                // creating object for single result
                $keywordSearchResult = new stdClass();
                $keywordSearchResult->keyword_name = $keyword;
                $keywordSearchResult->rank = $key;
                // creating nested object named meta for metadata separation
                $keywordSearchResult->meta = new stdClass();
                //foreach loop for mapping child nodes of current normal site block
                foreach ($site->childNodes as $node) {
                    // if condition for getting result's title, link and promoted status
                    if ($node->getAttribute("class") == "egMi0 kCrYT") {
                        //  url of site
                        $keywordSearchResult->meta->url = "www." . $this->searchEngine . $node->firstChild->getAttribute("href");
                        // title of site
                        $keywordSearchResult->meta->title = $xpath->query('a/h3', $node)->item(0)->textContent;
                        // bool For [Add or normal] site link
                        $keywordSearchResult->meta->promoted = 0;
                    }
                    // if condition for getting description of normal site
                    if ($node->getAttribute('class') == "kCrYT") {

                        $keywordSearchResult->meta->description = $xpath->query('*/div[@class="BNeawe s3v9rd AP7Wnd"]', $node)->item(0)->textContent;
                    }
                }
                // pushing normal sites data object into $keywordFinalResult array
                array_push($keywordFinalResult, $keywordSearchResult);
            }
            // storing a $kIndex keyword's results array into collection array
            $this->resultCollection[$kIndex] = $keywordFinalResult;
        }


        curl_close($curl);

        return $this->resultCollection;
    }


}

