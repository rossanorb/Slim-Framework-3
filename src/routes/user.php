<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;
use App\Models\User;

$app->get('/users', function (Request $request, Response $response, array $args) {
    $users = User::all();
    return $response->withJson($users);
});

$app->post('/login', function (Request $request, Response $response, array $args) {
    $post = $request->getParsedBody();
    $username = $post['username'] ?? null;
    $password = $post['password'] ?? null;

    try {
        $user = User::where('username', $username)->first();

        if (!is_null($user) and password_verify($password, $user->password)) {
            $key = $this->get('settings')['secretKey'];

            return $response->withJson([
                'token' => JWT::encode($user, $key)
            ]);
        }

        return $response->withJson(['status' => 'Unauthorized'], 401);
    } catch (\Exception $e) {
        $this->logger->info($e->getMessage());
    }

    return $response->withJson(['status' => 'Resource temporarily unavailable'], 503);

});