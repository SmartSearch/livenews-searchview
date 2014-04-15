<?php

namespace prisadigital\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class SMARTSearchController {

    public function indexAction(Request $request, Application $app) {
        
        $api = $app['smart'];
        
        
        $data = array(
            'document'  => array('id' => 'city'),
            'ciudad'    => $api->search('crowd'),
            'deporte'   => $api->search('sport'),
            'colores'   => $this->getFixDataColor(),
            'comercio'  => $api->search('commerce'),
            'cultura'   => $api->search('music'),
            'trafico'   => $api->search('traffic'),
        );
        
        
       return $app['twig']->render('index.html.twig', $data);
    }
    
    public function queryAction(Request $request, Application $app) {
        $query  = $request->query->get('query');
        $origen = $request->query->get('origen');
        
        if (empty($query) && !empty($origen)) {
            $query = $origen;
        }
        
        $lat = $request->query->get('latitud');
        $lon = $request->query->get('longitud');
        
        $api = $app['smart'];
        
        $data = array(
            'search'    => $api->search($query, $lat, $lon),
        );
       return $app['twig']->render('query.html.twig', $data);
    }
    
    private function getFixDataColor() {
        return array(
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
    }
    
}

