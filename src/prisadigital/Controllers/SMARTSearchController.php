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
namespace prisadigital\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class SMARTSearchController {

	/*
	 *
	 * @param Request request
	 * @param Application app
	 */
    public function indexAction(Request $request, Application $app) {
        
        $smart = $app['smart'];
        
        $data = array(
            'document'  => array('id' => 'city'),
            'ciudad'    => $smart->search('crowd'),
            'deporte'   => $smart->search('sport'),
            'colores'   => $this->getFixDataColor(),
            'comercio'  => $smart->search('shop'),
            'cultura'   => $smart->search('music'),
            'trafico'   => $smart->search('traffic'),
            'search'    => $smart->search(''),
        );
       return $app['twig']->render('index.html.twig', $data);
    }
    
	/*
	 *
	 * @param Request request
	 * @param Application app
	 */
    public function queryAction(Request $request, Application $app) {
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
    }
    
	/*
	 *
	 */
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
