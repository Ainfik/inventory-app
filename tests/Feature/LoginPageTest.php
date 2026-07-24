<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginPageTest extends TestCase
{
    public function test_login_route_is_accessible(): void
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
    }
}