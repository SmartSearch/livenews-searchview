<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//$app->get('/', 'prisadigital\\Controllers\\SMARTSearchController::indexAction')->bind('homepage');
//$app->get('/api/v1', 'prisadigital\\Controllers\\SMARTSearchController::queryAction');
$app->get('/', 'smartsearch_client\\Controllers\\SMARTSearchController::indexAction')->bind('homepage');
$app->get('/api/v1', 'smartsearch_client\\Controllers\\SMARTSearchController::queryAction');


$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return new Response($message, $code);
});

return $app;
