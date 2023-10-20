<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_success(): void
    {
        $response = $this->get(route('realty-items.index'));

        $response->dd();

        $response->assertStatus(200);
    }
}
