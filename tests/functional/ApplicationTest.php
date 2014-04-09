<?php

use Silex\WebTestCase;
use Silex\Application;

class ApplicationTest extends WebTestCase
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

    public function testHomepage()
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', '/');
        
        $this->assertEquals(
        		200, 
        		$client->getResponse()->getStatusCode());
    }

    public function test404()
    {
        $client = $this->createClient();
        
        $crawler = $client->request('GET', '/give-me-a-404');
        
		$this->assertTrue($client->getResponse()->isNotFound());

    }

}
