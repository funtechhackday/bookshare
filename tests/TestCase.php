<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function defaultAuth()
    {
        $authRequest = $this->post('/api/login', [
            'email' => 'fake@mail.ru',
            'password' => 'secret'
        ]);
        $authRequest->assertStatus(200);

        $json = $authRequest->json();
        $this->assertNotEmpty($json['auth_token']);
        return $json;
    }
}
