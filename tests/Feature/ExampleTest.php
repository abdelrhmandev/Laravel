<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
<<<<<<< HEAD
    public function test_the_application_returns_a_successful_response(): void
=======
    public function test_the_application_returns_a_successful_response()
>>>>>>> cab9740849138dd8d3b042f8303653335d5ef8f4
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
