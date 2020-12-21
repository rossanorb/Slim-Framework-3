<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

use Tuupola\Middleware\JwtAuthentication;


$app->add(new JwtAuthentication([
    'regexp' => '/(.*)/',
    'header' => 'Authorization',
    "path" => ["/users", "/breeds"],
    'realm' => 'Protected',
    'secret' => $container['settings']['secretKey']
]));
