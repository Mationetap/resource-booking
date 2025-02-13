<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Resource;

class ResourceApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Проверяем, что можно создать ресурс через API.
     */
    public function testCanCreateResource()
    {
        $data = [
            'name' => 'Комната переговоров',
            'type' => 'room',
            'description' => 'Большая переговорная комната'
        ];

        $response = $this->postJson('/api/resources', $data);
        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Комната переговоров']);

        $this->assertDatabaseHas('resources', ['name' => 'Комната переговоров']);
    }

    /**
     * Проверяем получение списка ресурсов.
     */
    public function testCanGetResources()
    {
        Resource::factory()->create(['name' => 'Room 101']);
        Resource::factory()->create(['name' => 'Room 102']);

        $response = $this->getJson('/api/resources');
        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Room 101'])
            ->assertJsonFragment(['name' => 'Room 102']);
    }
}
