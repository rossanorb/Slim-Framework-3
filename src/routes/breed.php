<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Breed;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$app->get('/breeds', function (Request $request, Response $response, array $args) {


    $log = new Logger('log');
    $log->pushHandler(new StreamHandler('/var/www/logs/hg.log', Logger::DEBUG));


    try {
        $result = Breed::where('name','teste')->first();
        $log->debug(print_r($result, true));

    } catch (\Exception $e) {
        //throw $th;
    }

    return $response->withJson([
        'status' => true,
        'message' => 'Everything is ok!',
        'result' => $result
    ], 200);

});