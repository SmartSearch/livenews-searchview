<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//$app->get('/', 'prisadigital\\Controllers\\SMARTSearchController::indexAction')->bind('homepage');
//$app->get('/api/v1', 'prisadigital\\Controllers\\SMARTSearchController::queryAction');

//$app->get('/', 'smartsearch_client\\Controllers\\SMARTSearchController::indexAction')->bind('homepage');
//$app->get('/api/v1', 'smartsearch_client\\Controllers\\SMARTSearchController::queryAction');


$app->get('/', function (Request $request) use ($app) {
    
    $getFixDataColor = array(
        array(
            'icono' => './img/crowd.png',
            'descripcion' => 'Los colores predominantes en la ciudad de Santander son el Gris, negro y azul',
            'autor'     => 'Ahora'
        ),
        array(
            'icono' => './img/crowd.png',
            'descripcion' => 'Los colores predominantes en la ciudad de Santander son el Gris, negro y azul',
            'autor'     => 'Esta mañana'
        ),
        array(
            'icono' => './img/crowd.png',
            'descripcion' => 'Los colores predominantes en la ciudad de Santander son el Gris, negro y azul',
            'autor'     => 'Ayer'
        ),
    );
    
    $smart = $app['smart'];
    $data = array(
        'document'  => array('id' => 'city'),
        'ciudad'    => $smart->search('crowd'),
        'deporte'   => $smart->search('sport'),
        'colores'   => $getFixDataColor,
        'comercio'  => $smart->search('shop'),
        //'cultura'   => $smart->search('music'),
        'cultura'   => $smart->culture(),
        'trafico'   => $smart->search('traffic'),
        'search'    => $smart->search('')
    );
   return $app['twig']->render('index.html.twig', $data);

})->bind('homepage');


$app->get('/api/v1', function (Request $request) use ($app) {
    $query  = $request->query->get('query');
    $origen = $request->query->get('origen');
    $since = $request->query->get('since');

    if (empty($query) && !empty($origen)) {
        $query = $origen;
    }

    $lat = $request->query->get('latitud');
    $lon = $request->query->get('longitud');
    $smart = $app['smart'];

    $data = array(
        'search' => $smart->search($query, $lat, $lon, $since),
    );

    return $app['twig']->render('query.html.twig', $data);    
});


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
