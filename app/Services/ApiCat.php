<?php

namespace App\Services;

use App\Models\Breed;

class ApiCat
{

    private static $app;

    private static function request(string $name): Array {

        $curl = curl_init();
        $api = self::$app->get('settings')['api'];
        $content = [];

        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$api}/v1/breeds/search?name={$name}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "x-api-key: DEMO-API-KEY"
            ),
        ));

        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            self::$app->logger->info("cURL Error #:" . $err);
        }

        if($response){
            $content = json_decode($response, true);
        }

        return [
            'http_code' => $info['http_code'],
            'content' => $content
        ];
    }

    private static function register($request): bool {
        $has_result = count($request['content']) ? true : false;
        if(!$has_result){
            return false;
        }

        $content = current($request['content']);
        $content['weight_imperial'] = $content['weight']['imperial'];
        $content['weight_metric'] =  $content['weight']['metric'];
        unset($content['weight']);
        // self::$app->logger->info( print_r($content, true));

        $breed = Breed::create($content);

        return true;
    }

    public static function find(string $name, $app): Array {
        self::$app = $app;
        $request = self::request($name);
        $request['http_code'] = $request['http_code'] != 0 ? $request['http_code'] : 503;
        self::register($request);
        return $request;
    }

}