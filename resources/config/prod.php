<?php

// Log
$app['monolog.logfile'] = __DIR__.'/../log/searchview.log';
$app['monolog.name']    = 'searchview';

// Local
$app['locale'] = 'en';
$app['session.default_locale'] = $app['locale'];

// Cache
$app['cache.path'] = __DIR__ . '/../cache';

// Http cache
$app['http_cache.cache_dir'] = $app['cache.path'] . '/http';

// Twig cache
$app['twig.options.cache'] = $app['cache.path'] . '/twig';

// Assetic
$app['assetic.enabled']              = true;
$app['assetic.path_to_cache']        = $app['cache.path'] . '/assetic' ;
$app['assetic.path_to_web']          = __DIR__ . '/../../web/assets';
$app['assetic.input.path_to_assets'] = __DIR__ . '/../assets';
// Style sheets
$app['assetic.input.path_to_css']       = array(
		$app['assetic.input.path_to_assets'] . '/css/base.css',
		$app['assetic.input.path_to_assets'] . '/css/style.css'
);
$app['assetic.output.path_to_css']      = 'css/styles.css';
// JavaScript libraries
$app['assetic.input.path_to_js']        = array(
    $app['assetic.input.path_to_assets'] . '/js/transition.js',
    $app['assetic.input.path_to_assets'] . '/js/funciones.js',
    $app['assetic.input.path_to_assets'] . '/js/SimpleMediaPlayer.min.js',
);
$app['assetic.output.path_to_js']       = 'js/scripts.js';

// SMART Search configuration
$app['smart.url'] = 'http://demos.terrier.org/v1/';
// SMART Search configuration - END
