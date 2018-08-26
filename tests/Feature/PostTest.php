<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function testsPostsAreCreatedCorrectly()
    {
        $payload = [
            'title' => 'Lorem',
            'body' => 'Ipsum',
            'category_id' => 2
        ];

        $this->json('POST', '/api/posts', $payload)
            ->assertStatus(201)
            ->assertJson(['title' => 'Lorem', 'body' => 'Ipsum', 'category_id' => 2]);
    }

    public function testsPostsAreUpdatedCorrectly()
    {
        $post = factory(Post::class)->create([
            'title' => 'Lorem',
            'body' => 'Ipsum',
            'category_id' => 2
        ]);

        $payload = [
            'title' => 'First Post',
            'body' => 'First Body',
            'category_id' => 1,
        ];

        $this->json('PUT', '/api/posts/' . $post->id, $payload)
            ->assertStatus(200)
            ->assertJson([
                'title' => 'First Post',
                'body' => 'First Body',
                'category_id' => 1
            ]);
    }

    public function testsPostsAreDeletedCorrectly()
    {
        $post = factory(Post::class)->create([
            'title' => 'Second Post',
            'body' => 'Second Body',
        ]);

        $this->json('DELETE', '/api/posts/' . $post->id, [])
            ->assertStatus(204);
    }

    public function testsPostsAreListedCorrectly()
    {
        factory(Post::class)->create([
            'title' => 'First Post',
            'body' => 'First Body',
            'category_id' => 1
        ]);

        factory(Post::class)->create([
            'title' => 'Second Post',
            'body' => 'Second Body',
            'category_id' => 2
        ]);

        $this->json('GET', '/api/posts', [])
            ->assertStatus(200)
            ->assertJson([
                ['title' => 'First Post', 'body' => 'First Body', 'category_id' => 1],
                ['title' => 'Second Post', 'body' => 'Second Body', 'category_id' => 2]
            ])
            ->assertJsonStructure([
                '*' => ['body', 'title', 'category_id', 'created_at', 'updated_at'],
            ]);
    }
}
