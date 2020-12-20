<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Breed;
use App\Services\ApiCat;

$app->get('/breeds', function (Request $request, Response $response, array $args) {

    $status = false;
    $content = [];
    $code = 200;
    $cached = true;

    $name =  $request->getQueryParam('name') ?? '';

    if($name){
        try {
            $content = Breed::where('name', $name)->first();

        } catch (Exception $e) {
            $this->logger->info($e->getMessage());
        }

        if(!$content){
            $result = ApiCat::find($name, $this);
            $content = $result['content'];
            $code = $result['http_code'];
            $cached = false;

            $status = $code == 200 && $content ? true : false ;
        }

    }

    return $response->withJson([
        'status' => $status,
        'cached' => $cached,
        'content' => $content
    ], $code);

});