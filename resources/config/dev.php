<?php

// include the prod configuration
require __DIR__.'/prod.php';

// enable the debug mode
$app['debug'] = true;
$app['monolog.level'] = 200; // Logger::INFO
