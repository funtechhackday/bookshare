<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAuth()
    {

        $authIncorrectRequest = $this->post('/api/login', [
            'email' => 'fake@mail.ru',
            'password' => 'secret1'
        ]);
        $authIncorrectRequest->assertStatus(302);

        $json = $this->defaultAuth();
        $this->assertNotEmpty($json['auth_token']);
        $auth_token = $json['auth_token'];
    }
}
