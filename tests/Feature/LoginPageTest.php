<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginPageTest extends TestCase
{
    public function test_login_page_can_be_displayed(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}