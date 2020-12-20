<?php

namespace App\Services;

class ApiCat
{

    private static function request(string $name, $app): Array {

        $curl = curl_init();
        $api = $app->get('settings')['api'];
        $content = [];

        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$api}/v1/breeds/search?name={$name}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 5,
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
            $app->logger->info("cURL Error #:" . $err);
        }

        if($response){
            $content = json_decode($response);
        }

        return [
            'http_code' => $info['http_code'],
            'content' => $content
        ];
    }

    private static function register(){

    }

    public static function find(string $name, $app): Array {
        $request = self::request($name, $app);
        $request['http_code'] = $request['http_code'] != 0 ? $request['http_code'] : 503;
        // self::register($request);
        $app->logger->info( print_r($request, true));
        return $request;
    }

}