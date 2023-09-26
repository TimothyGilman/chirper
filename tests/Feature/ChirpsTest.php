<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Chirp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChirpsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_chirps_page_is_displayed(): void
    {
        $user = User::factory()->create();
 
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/chirps');

        $response->assertStatus(200);
    }

    /**
     * Test Chirp Model instantiation.
     */
    public function test_chirp_model_can_be_instantiated(): void
    {
        $chirp = Chirp::factory()->create();
 
        //$this->assertNotNull($chirp);
        $this->assertModelExists($chirp);
    }
}
