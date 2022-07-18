<h1 align="center">SrMetaExtractor</h1>
<p align="center">The purpose of this package is to extract meta data for given array of keywords and from specified search engine</p>


<h3>Installation</h3>
<p>To install this package run composer command.</p>

<code>
    composer require fynda/sr-meta-extractor
</code>

<h3>Usage</h3>
<p>To use this package Follow the below procedure</p>
<code> 
use Fynda\SrMetaExtractor\SrMetaExtractor;

    try{
            $me= new SrMetaExtractor(); 
            $me->setSearchEngine(); // default search engin is google.com you can set google.ae or google.uk
            $data= $me->search(["keywords1","keyword2"]); 
        
            foreach($data as $keywords){
                foreach($keywords as $sResult){
                    echo $sResult->title;
                }
                    
            }

    }catch (\Exception $ex){
            echo $ex->getMessage();
    }

</code>


<h3>Sample Output: <small>Keywords Array ["top hosting websites","best trading websites"]</small></h3>

<code>


    Array(
        [0] => Array
            (
            [0] => stdClass Object
                (
                    [keyword_name] => top hosting websites
                    [rank] => 0
                    [url] => http://www.google.com/aclk?sa=l&ai=DChcSEwjY1uSp2dT4AhUBNJEKHesKAjEYABACGgJjZQ&sig=AOD64_1Q4b0plg-0LUfrbShA4d6bWAXYcw&ved=2ahUKEwjpj-Cp2dT4AhWWCbkGHb5sDzMQ0Qx6BAgMEAE&adurl=
                    [title] => Most Recommend Hosting Service - No. 1 Web Hosting Company
                    [promoted] => 1
                    [description] => Looking For Best Hosting Check Out Websouls. Top Hosting Company in Pakistan. Most Reliable Name in Pakistan's Hosting Industry, Serving thousands of clients since 2002. 
                
                )

            [1] => stdClass Object
                (
                    [keyword_name] => top hosting websites
                    [rank] => 1
                    [url] => http://www.google.com/aclk?sa=L&ai=DChcSEwjY1uSp2dT4AhUBNJEKHesKAjEYABAAGgJjZQ&sig=AOD64_2GglDTcOGn5Bf5hN0e9_5fif63AA& ved=2ahUKEwjpj-Cp2dT4AhWWCbkGHb5sDzMQ0Qx6BAgNEAE&adurl=
                    [title] => Free Web Hosting Solutions - Deploy Websites for Free
                    [promoted] => 1
                    [description] => Experience The Wide Range of Secure & Scalable AWS Webapp Hosting Options. Sign Up Today! Explore Low-Cost Ways To Deliver Websites & Web Applications With AWS. Sign Up for Free! Reliable & Scalable. Broad Platform Support. Worldwide Datacenters. Secure & Durable.
                

                )

        )

    [1] => Array
        (
            [0] => stdClass Object
                (
                    [keyword_name] => best trading websites
                    [rank] => 0
                    [url] => http://www.google.com/aclk?sa=l&ai=DChcSEwiejcOq2dT4AhWnQkgAHYNwDQIYABAAGgJjZQ&sig=AOD64_3H0S-H85AjCDmrjXJ6kXda76pHLQ&ved=2ahUKEwiAib6q2dT4AhUEBrkGHaN7ArAQ0Qx6BAgMEAE&adurl=
                    [title] => Start Trading at XM Now - On Desktop, Mobile & Tablet
                    [promoted] => 1
                    [description] => Trade The Markets with Fast Direct Execution and Support in 30+ Languages at XM. Licensed and Regulated Broker, Multi Awarded Platforms Available On Any Device & 24/7 Help. 24/7 support-30 languages. Legendary no requotes. MT4 VPS for EAs. $0 fees on deposits.
                

                )

            [1] => stdClass Object
                (
                    [keyword_name] => best trading websites
                    [rank] => 0
                    [url] => www.google.com/url?q=https://www.stockbrokers.com/guides/beginner-investors&sa=U&ved=2ahUKEwiAib6q2dT4AhUEBrkGHaN7ArAQFnoECAoQAg&usg=AOvVaw2jwsgHDJqaIKeRiZ_FXWCe
                    [title] => 5 Best Trading Platforms for Beginners 2022 - StockBrokers.com
                    [promoted] => 0
                    [description] => 21-May-2022 · Best Trading Platforms for Beginners 2022 · Fidelity - Best overall for beginners · TD Ameritrade - Excellent education · E*TRADE - Best for ease ...
            

                )


        )

    )

</code>

<h4 align="center">Thanks</h4>



















