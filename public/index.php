<?php

// Initial point of the Application

ini_set('display_errors', 0);

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Application;

$application = new Application();
$application->run();