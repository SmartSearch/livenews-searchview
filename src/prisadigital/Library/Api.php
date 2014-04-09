<?php


namespace prisadigital\Library;

/**
 * Description of Api
 *
 */
class Api {
    
    /**
     *
     * @var string
     */
    private $url;
    
    /**
     *
     * @var array
     */
    private $queryParams;  
    
    private $completeUrl;
    
    private $response;
    /**
     *
     * @var bool
     */
    private $success;
    
    function __construct() {
        $this->success = false;
    }

    
    
    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function getUrl() {
        return $this->url;
    }

        
    public function getQueryParams() {
        return $this->queryParams;
    }
    
    public function getResponse() {
        return $this->response;
    }

    public function setQueryParams($queryParams) {
        $this->queryParams = $queryParams;
    }

    public function getCompleteUrl() {
        return $this->completeUrl;
    }

    public function isSuccess() {
        return $this->success;
    }
    
    public function request() {
        $url = trim($this->getUrl(), '?&');
        $query = http_build_query($this->getQueryParams());
        
        $this->success = false;
        
        $this->completeUrl = $url . ((strpos($url, '?')===false)?'?':''). $query;
        
        $response = $this->response = @file_get_contents($this->completeUrl );
        

        if ($response !== false) {
            $data = @json_decode($response, true);
            if ($data !== false) {
                $this->success = true;
                return $data;
            }
        }
        
        
        return $this->success = false;
        
    }
    
    
}
