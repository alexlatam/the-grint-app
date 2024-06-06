<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\Advertisement;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;

class AdvertisementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // fake user
        $this->user = User::factory()->create([
            'name' => 'Alexis',
            'lastname' => 'Montilla',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);


        $this->category = Category::factory()->create([
            'title' => 'sports'
        ]);

        Advertisement::factory()->count(8)->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'new',
            'price' => rand(0, 500),
            'final_date' => Carbon::now()->addDays(10)
        ]);

        // authenticate user
        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $this->token = $response->json('access_token');
    }

    public function test_get_all_advertisement()
    {
        // call the endpoint
        $response = $this->getJson('/api/advertisements?show_all=1&status=new&keyword=et&category_id=1&min_price=0&max_price=300');

        // verify response structure
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'description',
                        'price',
                        'status',
                        'final_date',
                        'created_at',
                        'user' => [
                            'name',
                            'lastname'
                        ],
                        'category' => [
                            'name'
                        ]
                    ]
                ],
                'links' => [
                    'total',
                    'currentPage',
                    'lastPage',
                    'perPage',
                    'path'
                ]
            ]);

        // verify some values
        $responseData = $response->json('data');
        $this->assertEquals('Alexis', $responseData[0]['user']['name']);
        $this->assertEquals('sports', $responseData[0]['category']['name']);
    }

    public function test_can_cancel_advertisement()
    {
        $ad = Advertisement::first();

        // call endpoint
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->deleteJson("/api/advertisements/{$ad->id}");

        // verify response structure
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Advertisement canceled successfully'
            ]);

        // verify in the database
        $this->assertDatabaseMissing('advertisements', [
            'id' => $ad->id,
            'deleted_at' => null
        ]);
    }
}

