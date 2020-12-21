<?php

namespace Tests\Unit;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;
use Tests\BaseTestCase;

class BreedTest extends BaseTestCase
{

    public function token(){

        $response = $this->runApp('POST', '/login', [
            'username' => 'admin',
            'password' => '@#$RF@!718'
        ]);

        $body = json_decode($response->getBody(), true);

        return $body['token'];
    }

    public function testSearchBreedByNameUnauthorized()
    {
        $this->setToken('xxxxx');
        $response = $this->runApp('GET', '/breeds?name=American Curl');
        $this->assertEquals(401, $response->getStatusCode());
    }

    public function testSearchBreedByName(){
        $this->setToken($this->token());
        $response = $this->runApp('GET', '/breeds?name=American Curl');
        $body = json_decode($response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('content', (string)$response->getBody());
        $this->assertContains('name', (string)$response->getBody());
        $this->assertEquals(true, $body['status']);
        $this->assertEquals('American Curl', $body['content']['name']);
    }

    public function testSearchCatApi(){
        $this->setToken($this->token());
        $response = $this->runApp('GET', '/breeds?name=xxxxx');
        $body = json_decode($response->getBody(), true);
        $this->assertEquals(false, $body['cached']);
    }

    public function testSearchBreedByNameNotFound(){
        $this->setToken($this->token());
        $response = $this->runApp('GET', '/breeds?name=xxxxx');
        $body = json_decode($response->getBody(), true);

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals(false, $body['status']);
        $this->assertEquals(false, $body['cached']);
    }

    public function testSearchBreedByParamInvalid(){
        $this->setToken($this->token());

        $response = $this->runApp('GET', '/breeds?potato=American Curl');
        $this->assertEquals(404, $response->getStatusCode());

        $response = $this->runApp('GET', '/breeds?name=');
        $this->assertEquals(404, $response->getStatusCode());

        $response = $this->runApp('GET', '/breeds');
        $this->assertEquals(404, $response->getStatusCode());

    }

}