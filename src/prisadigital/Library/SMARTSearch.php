<?php
/*
* SMART FP7 - Search engine for MultimediA enviRonment generated contenT
* Webpage: http://smartfp7.eu
*
* This Source Code Form is subject to the terms of the Mozilla Public
* License, v. 2.0. If a copy of the MPL was not distributed with this
* file, You can obtain one at http://mozilla.org/MPL/2.0/.
*
* The Original Code is Copyright (c) 2012-2014 PRISA Digital
* All Rights Reserved
*/
namespace prisadigital\Library;

use DateTime;
use Exception;
use Monolog\Logger;
use prisadigital\Entity\Latest;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class SMARTSearch {
    
    protected $logger;
    protected $url;
	protected $startDate;
    protected $news_q;
    protected $weather_q;
	protected $events_culture_q;
	protected $events_traffic_q;
	protected $events_sport_q;
	protected $events_commerce_q;
    protected $wheaterRequest;
    
    /**
     * @param logger - Logger. Instance of the application's logger
	 * @param url - String. URL for the SMART Search service
     */
    function __construct(Logger $logger, $url) {
        $this->logger                = $logger;
        $this->url                   = $url;
		$startDate                   = '2013-11-01';
		/*
		Here is where we define the API to use the SMART Search service
		Detailed documentation about this API is
		in http://opensoftware.smartfp7.eu/projects/smart/wiki/SearchApi
		*/
        $this->news_query            = 'search.json?q=santander';
        $this->weather_query         = 'search.json=q=crowd';
		$this->events_culture_query  = 'predefined.json?c=cult';
		$this->events_traffic_query  = 'predefined.json?c=traffic';
		$this->events_sport_query    = 'predefined.json?c=sport';
		$this->events_commerce_query = 'predefined.json?c=commerce';
    }

    /**
     * Gets the Today news
	 * 
     * @return array Latest
     * @throws Exception
     */
    public function noticia() {
		$context = 'SMARTSearch.noticia';
		$this->logger->info($context.' Trying to get the Today news.');

        $api    = $this->getSearchApi();
        $api->setQueryParams(array("q" => $this->news_q, "since" => date('Y-m-d')));
        
        try {
			$result = $api->search();
            if (isset($result['rssfeeds']['results'][0]['title'])) {
                return $result['rssfeeds']['results'][0]['title'];
            } else {
				$this->logger->info($context.' No results.');
			}
        } catch(Exception $e) {
			$this->logger->error($context.' Some weird problem trying to get the news', array('error' => $e->getMessage()));
        }
        return null;
    }    
    
    /**
     * Gets the weather info for Today
	 *
	 * @returns string Weather data for Today
     */
    public function weatherToday() {
		$this->logger->info('Trying to get the Today weather');
		
        if (!is_null($this->wheaterRequest)) {
            $content = $this->wheaterRequest;
            if (!empty($content)) 
            {
                $encontrados=array();
                preg_match('/temperature":"[0-9.]{5}/',$content,$encontrados);
                if (count($encontrados)) {
                    $partes=explode('"', $encontrados[0]);
					$this->logger->info('We have been able to retrieve weather data for Today');
                    return  sprintf("%2.1f",end($partes)) ;
                }
            }
        }
		$this->logger->info('We have NOT been able to retrieve weather data for Today');
        return null;
    }
    
    /**
     *
	 * @throws Exception
     */
    public function weather() {
        $data = array();
        $params =  array('q' => $this->weather_q, "since"=>date('Y-m-d'));
        $api = $this->getSearchApi();
        $api->setQueryParams($params);
        
        try {
            $result = $api->request();
            $this->wheaterRequest = $api->getResponse();
            
            if (!$api->isSuccess()) {
                throw new Exception(' URL: '.$api->getCompleteUrl());
            } 
        } catch(Exception $e) {
           $this->logger->error($e->getMessage());
        }
        return $result;        
    }
    
    /**
     * 
     * @param string query
	 * @param float lat
	 * @param float lon
     * @return array Latest
     * @throws Exception
     */
    public function search($query, $lat=null, $lon=null) {
        $data = array();
        $params =  array("q"=>$query, "since"=>"2013-11-01");
        
        if (!is_null($lat) && !is_null($lon)) {
            $params = array_merge($params, array('lat' => $lat, 'lon' => $lon));
        }
        $api = $this->getSearchApi();
        $api->setQueryParams($params);
        
		try {
			$result = $api->search();
			if (!$api->isSuccess()) {
				throw new Exception(' Fail request from WebService ');
			} 
			if (isset($result['results'])) {
				foreach ($result['results'] as $elem) {
					$data[] = new Latest(
							$elem['id'], 
							new DateTime($elem['startTime']), 
							$elem['activity'], 
							$elem['locationId'], 
							$elem['locationName'], 
							$elem['locationAddress'], 
							$elem['observations'], 
							$elem['latestObservations'], 
							$elem['media'], 
							$elem['lat'], 
							$elem['lon'], 
							$elem['rank'], 
							$elem['score'], 
							$elem['description'], 
							$elem['URI'], 
							$elem['title'], 
							$elem['geohash'], 
							$elem['lorder'], 
							$elem['triggers']
					);
				}
			}
		} catch(Exception $e) {
			$this->logger->error($e->getMessage());
		}
		return $data;
    }
    
    /**
     *
	 * @return Api
     */
    private function getSearchApi() {
        static $api;
        if (is_null($api)) {
            $api = new Api($this->logger, $this->url);
        }
        return $api;
    }
}