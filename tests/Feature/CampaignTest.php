<?php

namespace Tests\Feature;

use App\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CampaignTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_campaign()
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->json('POST', '/campaigns', [
            'name' => 'Test Campaign',
            'from_date' => now(),
            'to_date' => now()->addDays(30),
            'total_budget' => 30000,
            'daily_budget' => 1000,
            'images' => [$file],
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseCount('campaigns', 1);
        $this->assertDatabaseHas('campaigns', ['name' => 'Test Campaign']);
    }

    public function test_can_fetch_campaigns()
    {
        $campaigns = Campaign::factory()->count(2)->create();

        $response = $this->json('GET', '/campaigns');

        $response->assertStatus(200);
        $response->assertJsonCount($campaigns->count());
    }
}
