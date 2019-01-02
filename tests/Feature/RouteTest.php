<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function is_redirected_to_login_Test()
    {
        $response = $this->get('/');
        $response->assertUrlIs('/');
    }
}
