<?php

use Slim\Http\Request;
use Slim\Http\Response;

$container['db'];

// Routes

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    // $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

require __DIR__ . '/routes/user.php';
require __DIR__ . '/routes/breed.php';