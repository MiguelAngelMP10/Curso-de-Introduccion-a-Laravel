<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic feature test About.
     *
     * @return void
     */
    public function testAbout()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }
}