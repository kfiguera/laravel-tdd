<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Repository;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RepositoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_guest()
    {
        $this->get('repositories')->assertRedirect('login');            //index
        $this->get('repositories/1')->assertRedirect('login');          //show
        $this->get('repositories/create')->assertRedirect('login');     //create
        $this->post('repositories')->assertRedirect('login');           //store
        $this->get('repositories/1/edit')->assertRedirect('login');     //edit
        $this->put('repositories/1')->assertRedirect('login');          //update
        $this->delete('repositories/1')->assertRedirect('login');       //destroy
    }

    public function test_store()
    {
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text,
        ];

        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('repositories', $data)
            ->assertRedirect('repositories');

        $this->assertDatabaseHas('repositories', $data);
    }

    public function test_update()
    {
        $repository = Repository::factory()->create();
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text,
        ];

        $user = User::factory()->create();

        $this->actingAs($user)
            ->put("repositories/{$repository->id}", $data)
            ->assertRedirect("repositories/{$repository->id}/edit");

        $this->assertDatabaseHas('repositories', $data);
    }
}
