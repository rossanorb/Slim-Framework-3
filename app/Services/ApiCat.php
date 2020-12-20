<?php

namespace App\Services;

class ApiCat
{
    public function __construct(){}

    public static function find(string $name) : Array {
        return [
            'status' => true,
            'message' => 'Everything is ok!'
        ];
    }

}