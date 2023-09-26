<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test the welcome View isn't rendered properly.
     */
    public function test_a_welcome_view_cant_be_rendered(): void
    {
        $view = $this->view('welcome', ['name' => 'Taylor']);
 
        $view->assertDontSee('Taylor');
    }
}
