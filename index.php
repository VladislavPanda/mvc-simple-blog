<?php

// Initial point of the Application

require_once __DIR__ . '/vendor/autoload.php';

use App\Application;

$routes = require_once 'routes/routes.php';

$application = new Application();
$application->run();

//$routes[$_SERVER['REQUEST_URI']]();