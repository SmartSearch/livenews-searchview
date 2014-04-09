<?php

namespace prisadigital\Library;

use DateTime;
use Exception;
use Monolog\Logger;
use prisadigital\Entity\Latest;
use Symfony\Component\HttpFoundation\Response;


class SMARTSearch {
    
    /**
     *
     * @var Logger
     */
    protected $logger;
    
    protected $url;
    
    protected $query_news;
    
    protected $query_weather;
    /**
     *
     * @var Response
     */
    protected $wheaterRequest;
    
    function __construct(Logger $logger, $url, $query_news, $query_weather) {
        $this->logger   = $logger;
        $this->url      = $url;
        $this->query_news    = $query_news;
        $this->query_weather = $query_weather;        
    }

        /**
     * 
     * @param string $query
     * @return array Latest
     * @throws Exception
     */
    public function noticia() {
        
        $data = array();
        $params =  array("q"=>$this->query_news, "since"=> date('Y-m-d'));
        $api = $this->getSearchApi();
        $api->setQueryParams($params);
        
        try {
            $this->traceRequest($api);

            $result = $api->request();
            
            if (!$api->isSuccess()) {
                $this->traceRequest($api);
                throw new Exception(
                        ' URL: '.$api->getCompleteUrl());
            } 

            $this->traceRequest($api);
            
            if (isset($result['rssfeeds']['results'][0]['title'])) 
            {
                return $result['rssfeeds']['results'][0]['title'];
            }   
            
        } catch(Exception $e) {
            $this->logger->error($e->getMessage());
        }
        
        return null;
    }    
    
    public function weatherToday() {
        if (!is_null($this->wheaterRequest)) {

            $content = $this->wheaterRequest;
            
            
            if (!empty($content)) 
            {
                $encontrados=array();
                preg_match('/temperature":"[0-9.]{5}/',$content,$encontrados);
                if (count($encontrados)) {
                    $partes=explode('"', $encontrados[0]);
                    return  sprintf("%2.1f",end($partes)) ;
                }
            }
            
        }
        
        return null;
    }
    
    public function weather() {
        $data = array();
        $params =  array('q' => $this->query_weather, "since"=>date('Y-m-d'));
        $api = $this->getSearchApi();
        $api->setQueryParams($params);
        
        try {
            $this->traceRequest($api);

            $result = $api->request();
            $this->wheaterRequest = $api->getResponse();
            
            if (!$api->isSuccess()) {
                $this->traceRequest($api);
                throw new Exception(' URL: '.$api->getCompleteUrl());
            } 

            $this->traceRequest($api);
            
            
        } catch(Exception $e) {
           $this->logger->error($e->getMessage());
        }
        
        return $result;        
        
    }
    
    /**
     * 
     * @param string $query
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
            $this->traceRequest($api);

            $result = $api->request();
            
            
            if (!$api->isSuccess()) {
                throw new Exception(' Fail request from WebService ');
            } 

            $this->traceRequest($api);
            
            if (isset($result['results'])) 
            {
                foreach ($result['results'] as $elem) 
                {
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
            $this->traceRequest($api);
            $this->logger->error($e->getMessage());
        }
        
        return $data;
    }
    
    
    private function traceRequest(Api $api) {
        static $time;
        if (is_null($time)) {
            $time = microtime(true);
        } else {
            $this->logger->info($api->getCompleteUrl());
            $time = null;
        }
        
    }
            
    
    private function getSearchApi(){
        static $api;
        if (is_null($api)) {
            $api = new Api();
            $api->setUrl($this->url);
        }
        
        return $api;
        
    }
}
