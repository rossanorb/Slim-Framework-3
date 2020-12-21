<?php

namespace Tests\Unit;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;
use Tests\BaseTestCase;

class UserTest extends BaseTestCase
{
    public function testLogin()
    {
        $response = $this->runApp('POST', '/login', [
            'username' => 'admin',
            'password' => '@#$RF@!718'
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('token', (string)$response->getBody());

    }

}