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

use Monolog\Logger;

/**
 *
 */
class Api {

	protected $logger;
	protected $searchMethod;
	protected $eventsMethod;
    protected $url;
    protected $queryParams;  
    protected $response;
    protected $success;
    
   /**
    *
	* @param Logger logger
	* @param String url
    */
    function __construct(Logger $logger, $url) {
		$this->logger      = $logger;
		$this->url         = $url;
		
		$this->searchMethod = 'search.json';
		$this->eventsMethod = 'predefined.json';
        $this->success      = false;
    }
    
   /**
    *
    */
    public function setLogger(Logger $logger) {
        $this->logger = $logger;
    }

	/**
    *
    */
    public function setUrl($url) {
        $this->url = $url;
    }
    
   /**
    *
    */
    public function getUrl() {
        return $this->url;
    }

   /**
    *
    */
    public function getQueryParams() {
        return $this->queryParams;
    }
    
   /**
    *
    */
    public function getResponse() {
        return $this->response;
    }

   /**
    *
    */
    public function setQueryParams($queryParams) {
        $this->queryParams = $queryParams;
    }

   /**
    *
    */
    public function isSuccess() {
        return $this->success;
    }
    
   /**
    * Executes a search against the SMART Search service
	* @throws Exception
    */
    public function search() {
		$context = 'Api.search';
		$this->logger->info($context.
		    ' Trying to execute a search using the SMART Search API');
        
		$this->success = false;
        $query = http_build_query($this->getQueryParams());
        
        $completeURL = $this->url. $this->searchMethod. "?". $query;
        $this->logger->info($context.
            ' The search we are trying to execute is {completeURL}.', 
            array("completeURL" => $completeURL));
        $response = $this->response = @file_get_contents($completeURL);

        if ($response !== false) {
            $data = @json_decode($response, true);
            if ($data !== false) {
                $this->logger->info($context.' The search was successfull.');
                $this->success = true;
            }
        }
		if ($this->success) {
			return $data;
		} else {
			throw new Exception($context.' The search has failed');
		}
    }
}
