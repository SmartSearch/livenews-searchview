<?php

use Silex\WebTestCase;
use Silex\Application;

class SearchAPITest extends WebTestCase
{
    public function createApplication()
    {
        // Silex
        $app = new Application();
        require __DIR__.'/../../resources/config/test.php';
        require __DIR__.'/../../src/app.php';

        $app['session.test'] = true;

        // Controllers
        require __DIR__ . '/../../src/controllers.php';

        return $this->app = $app;
    }

    /**
     * @param string $APICall API call to test
     * 
     * @dataProvider providerTestSearchAPI
     */
    public function testSearchAPI($APICall)
    {
        $this->markTestIncomplete();
    	
    	$client = $this->createClient();

    	$crawler = $client->request('GET', $APICall);

        $this->assertEquals(
        		200, 
        		$client->getResponse()->getStatusCode());
    }
    
    public function providerTestSearchAPI()
    {
    	$endPoint = 'http://demos.terrier.org/v1/search.json?q=';
    	$since = '&since=2014-01-01';
    	
    	return array(
    			array($endPoint.'crowd'.  $since),
    			array($endPoint.'sport'.  $since),
    			array($endPoint.'shop'.   $since),
    			array($endPoint.'music'.  $since),
    			array($endPoint.'traffic'.$since),
    	);
    }

}
