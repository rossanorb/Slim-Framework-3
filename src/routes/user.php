<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\User;

$app->get('/users', function (Request $request, Response $response, array $args) {
    $users = User::all();
    return $response->withJson($users);
});