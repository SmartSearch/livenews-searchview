<?php

// Log
$app['monolog.file'] = __DIR__.'/../resources/log/livenews.log';
$app['monolog.name'] = 'livenews';

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

$app['assetic.input.path_to_css']       = array(
		$app['assetic.input.path_to_assets'] . '/css/base.css',
		$app['assetic.input.path_to_assets'] . '/css/style.css'
);
$app['assetic.output.path_to_css']      = 'css/styles.css';
$app['assetic.input.path_to_js']        = array(
    $app['assetic.input.path_to_assets'] . '/js/jquery-1.8.2.js',
    $app['assetic.input.path_to_assets'] . '/js/transition.js',
    $app['assetic.input.path_to_assets'] . '/js/funciones.js',
    $app['assetic.input.path_to_assets'] . '/js/jquery.mousewheel.js',
    $app['assetic.input.path_to_assets'] . '/js/jquery.jscrollpane.min.js',
    $app['assetic.input.path_to_assets'] . '/js/SimpleMediaPlayer.min.js',
);
$app['assetic.output.path_to_js']       = 'js/scripts.js';

$app['smart.options.url'] = 'http://demos.terrier.org/v1/search.json';
$app['smart.options.query_news'] = 'santander';
$app['smart.options.query_weather'] = 'crowd';

