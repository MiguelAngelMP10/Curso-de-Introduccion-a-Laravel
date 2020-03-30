<?php

namespace Tests\Feature\Http\controllers\Api;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_store()
    {
        $this->withoutExceptionHandling();
        $response = $this->json('POST', '/api/posts', [
            'title' => 'El post de prueba'
        ]);

        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            ->assertJson(['title' => 'El post de prueba'])
            ->assertStatus(201); // ok, creado un recurso

        $this->assertDatabaseHas('posts', ['title' => 'El post de prueba']);
    }

    public function test_validate_title()
    {
        $response = $this->json('POST', '/api/posts', [
            'title' => ''
        ]);

        $response->assertStatus(422) //estatus HTTP 422
            ->assertJsonValidationErrors('title');
    }

    public function test_show()
    {
        $this->withoutExceptionHandling();

        $post = factory(Post::class)->create();

        $response = $this->json('GET', "/api/posts/$post->id"); //id = 1

        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            ->assertJson(['title' => $post->title])
            ->assertStatus(200); // ok
    }


    public function test_404_show()
    {
        //$this->withoutExceptionHandling();

        $response = $this->json('GET', '/api/posts/1000'); //id = 1000

        $response->assertStatus(404); // no existe
    }
}