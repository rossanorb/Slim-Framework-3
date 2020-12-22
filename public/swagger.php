<?php

require __DIR__ . '/../vendor/autoload.php';

$openapi = \OpenApi\scan(__DIR__.'/../src/routes');
header('Content-Type: application/json');
echo $openapi->toJson();
