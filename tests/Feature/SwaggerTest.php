<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SwaggerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_swagger_route_is_ok(): void
    {
        $response = $this->get('/api/documentation');

        $response->assertStatus(200);
    }
}
