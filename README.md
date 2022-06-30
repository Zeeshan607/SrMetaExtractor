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
                    echo $sResult->meta->title;
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
                    [meta] => stdClass Object
                        (
                            [url] => http://www.google.com/aclk?sa=l&ai=DChcSEwjY1uSp2dT4AhUBNJEKHesKAjEYABACGgJjZQ&sig=AOD64_1Q4b0plg-0LUfrbShA4d6bWAXYcw&ved=2ahUKEwjpj-Cp2dT4AhWWCbkGHb5sDzMQ0Qx6BAgMEAE&adurl=
                            [title] => Most Recommend Hosting Service - No. 1 Web Hosting Company
                            [promoted] => 1
                            [description] => Looking For Best Hosting Check Out Websouls. Top Hosting Company in Pakistan. Most Reliable Name in Pakistan's Hosting Industry, Serving thousands of clients since 2002. 
                        )
                )

            [1] => stdClass Object
                (
                    [keyword_name] => top hosting websites
                    [rank] => 1
                    [meta] => stdClass Object
                        (
                            [url] => http://www.google.com/aclk?sa=L&ai=DChcSEwjY1uSp2dT4AhUBNJEKHesKAjEYABAAGgJjZQ&sig=AOD64_2GglDTcOGn5Bf5hN0e9_5fif63AA&ved=2ahUKEwjpj-Cp2dT4AhWWCbkGHb5sDzMQ0Qx6BAgNEAE&adurl=
                            [title] => Free Web Hosting Solutions - Deploy Websites for Free
                            [promoted] => 1
                            [description] => Experience The Wide Range of Secure & Scalable AWS Webapp Hosting Options. Sign Up Today! Explore Low-Cost Ways To Deliver Websites & Web Applications With AWS. Sign Up for Free! Reliable & Scalable. Broad Platform Support. Worldwide Datacenters. Secure & Durable.
                        )

                )

            [2] => stdClass Object
                (
                    [keyword_name] => top hosting websites
                    [rank] => 2
                    [meta] => stdClass Object
                        (
                            [url] => http://www.google.com/aclk?sa=l&ai=DChcSEwjY1uSp2dT4AhUBNJEKHesKAjEYABADGgJjZQ&sig=AOD64_3lOSZQmURInaJ2Z5PP2tF1oS8Vqw&ved=2ahUKEwjpj-Cp2dT4AhWWCbkGHb5sDzMQ0Qx6BAgOEAE&adurl=
                            [title] => Verpex® Best Web Hosting - Best Hosting Services
                            [promoted] => 1
                            [description] => Free Domain, Free Migrations, SSL, cPanel, Unlimited Bandwidth, 24/7 Dev Support & More! Get Your Perfect Web Hosting Solution. Super Fast, Secure, Reliable & Unlimited Bandwidth! 24/7 Expert Support. Advanced Security. Services: Unlimited bandwidth, Multi-Location.
                        )

                )

            [3] => stdClass Object
                (
                    [keyword_name] => top hosting websites
                    [rank] => 3
                    [meta] => stdClass Object
                        (
                            [url] => http://www.google.com/aclk?sa=l&ai=DChcSEwjY1uSp2dT4AhUBNJEKHesKAjEYABABGgJjZQ&sig=AOD64_1zH2ivAMi_Vlgbx8og4eOG5_ElKw&ved=2ahUKEwjpj-Cp2dT4AhWWCbkGHb5sDzMQ0Qx6BAgPEAE&adurl=
                            [title] => The 10 Best Web Hosting 2022 - Save Up To 88%
                            [promoted] => 1
                            [description] => Site Owner? You Deserve Peace of Mind! Compare Trusted & Checked Web Hosting Services Here. Pick Your Website Host Based on Features Comparison: Load Time, Support...
                        )

                )

            [4] => stdClass Object
                (
                    [keyword_name] => top hosting websites
                    [rank] => 0
                    [meta] => stdClass Object
                        (
                            [url] => www.google.com/url?q=https://www.quicksprout.com/best-web-hosting/&sa=U&ved=2ahUKEwjpj-Cp2dT4AhWWCbkGHb5sDzMQFnoECAkQAg&usg=AOvVaw3i_tCw-nNHmcBV25IqNtXM
                            [title] => Top 10 Best Web Hosting Providers of 2022 – In-Depth Reviews
                            [promoted] => 0
                            [description] => 22-Jun-2022 · The Top 10 Best Web Hosting Providers. Hostinger – Most reliable web host overall · Bluehost – Best web host for beginners · Dreamhost – Most ...
                        )

                )

            [5] => stdClass Object
                (
                    [keyword_name] => top hosting websites
                    [rank] => 1
                    [meta] => stdClass Object
                        (
                            [url] => www.google.com/url?q=https://www.pcmag.com/picks/the-best-web-hosting-services&sa=U&ved=2ahUKEwjpj-Cp2dT4AhWWCbkGHb5sDzMQFnoECAoQAg&usg=AOvVaw1qHgTskrJkG9TP3gUx1U77
                            [title] => The Best Web Hosting Services for 2022 - PCMag
                            [promoted] => 0
                            [description] => HostGator is an excellent web hosting service that offers an array of powerful tools, including a terrific website builder, for bloggers and small businesses.Shared hosting · VPS hosting · Dedicated hosting · Cloud hosting
                        )

                )


        )

    [1] => Array
        (
            [0] => stdClass Object
                (
                    [keyword_name] => best trading websites
                    [rank] => 0
                    [meta] => stdClass Object
                        (
                            [url] => http://www.google.com/aclk?sa=l&ai=DChcSEwiejcOq2dT4AhWnQkgAHYNwDQIYABAAGgJjZQ&sig=AOD64_3H0S-H85AjCDmrjXJ6kXda76pHLQ&ved=2ahUKEwiAib6q2dT4AhUEBrkGHaN7ArAQ0Qx6BAgMEAE&adurl=
                            [title] => Start Trading at XM Now - On Desktop, Mobile & Tablet
                            [promoted] => 1
                            [description] => Trade The Markets with Fast Direct Execution and Support in 30+ Languages at XM. Licensed and Regulated Broker, Multi Awarded Platforms Available On Any Device & 24/7 Help. 24/7 support-30 languages. Legendary no requotes. MT4 VPS for EAs. $0 fees on deposits.
                        )

                )

            [1] => stdClass Object
                (
                    [keyword_name] => best trading websites
                    [rank] => 0
                    [meta] => stdClass Object
                        (
                            [url] => www.google.com/url?q=https://www.stockbrokers.com/guides/beginner-investors&sa=U&ved=2ahUKEwiAib6q2dT4AhUEBrkGHaN7ArAQFnoECAoQAg&usg=AOvVaw2jwsgHDJqaIKeRiZ_FXWCe
                            [title] => 5 Best Trading Platforms for Beginners 2022 - StockBrokers.com
                            [promoted] => 0
                            [description] => 21-May-2022 · Best Trading Platforms for Beginners 2022 · Fidelity - Best overall for beginners · TD Ameritrade - Excellent education · E*TRADE - Best for ease ...
                        )

                )

            [2] => stdClass Object
                (
                    [keyword_name] => best trading websites
                    [rank] => 1
                    [meta] => stdClass Object
                        (
                            [url] => www.google.com/url?q=https://www.nerdwallet.com/best/investing/online-brokers-for-stock-trading&sa=U&ved=2ahUKEwiAib6q2dT4AhUEBrkGHaN7ArAQFnoECAgQAg&usg=AOvVaw1C5tONvXpQIy7tLLotYVQD
                            [title] => 11 Best Online Brokers for Stock Trading of July 2022 - NerdWallet
                            [promoted] => 0
                            [description] => Best Online Brokers for 2022: Merrill Edge, Fidelity, E*TRADE, Interactive Brokers, Webull, Ally Invest, TradeStation, Zacks Trade, FirstTrade and Charles ...How to Choose the Best... · Merrill Edge Review 2022 · Charles Schwab Review
                        )

                )

            [3] => stdClass Object
                (
                    [keyword_name] => best trading websites
                    [rank] => 2
                    [meta] => stdClass Object
                        (
                            [url] => www.google.com/url?q=https://tradingplatforms.com/&sa=U&ved=2ahUKEwiAib6q2dT4AhUEBrkGHaN7ArAQFnoECAYQAg&usg=AOvVaw30Slk7_COFnBppg6LuQ8YX
                            [title] => Best Trading Platforms for Beginners 2022 - TradingPlatforms.com
                            [promoted] => 0
                            [description] => 22-Jun-2022 · Upon researching hundreds of online providers, we found that eToro is one of the best trading platforms to consider in 2022. First and foremost, ...
                        )

                )

            [4] => stdClass Object
                (
                    [keyword_name] => best trading websites
                    [rank] => 3
                    [meta] => stdClass Object
                        (
                            [url] => www.google.com/url?q=https://www.bankrate.com/investing/best-online-brokers-for-stock-trading/&sa=U&ved=2ahUKEwiAib6q2dT4AhUEBrkGHaN7ArAQFnoECAkQAg&usg=AOvVaw0ZBqS5O2nk-TjBeQuE7m4r
                            [title] => Best online brokers for stock trading in June 2022 - Bankrate.com
                            [promoted] => 0
                            [description] => 15-Jun-2022 · The best online brokers for stocks in 2022: · Charles Schwab · Fidelity Investments · TD Ameritrade · Robinhood · E-Trade · Interactive Brokers ...Charles Schwab · Fidelity Investments · TD Ameritrade · Robinhood
                        )

                )

            [5] => stdClass Object
                (
                    [keyword_name] => best trading websites
                    [rank] => 4
                    [meta] => stdClass Object
                        (
                            [url] => www.google.com/url?q=https://www.forbes.com/advisor/investing/best-online-brokers/&sa=U&ved=2ahUKEwiAib6q2dT4AhUEBrkGHaN7ArAQFnoECAcQAg&usg=AOvVaw0R_ZJMw7yqzoXcKmwYyW_R
                            [title] => Best Online Brokers Of June 2022 – Forbes Advisor
                            [promoted] => 0
                            [description] => 21-Jun-2022 · Forbes Advisor can help you choose the best. ... which trading platforms were the best for different types of users. ... Via eToro's Website ...
                        )

                )

      

        )

    )

</code>

<h4 align="center">Thanks</h4>



















