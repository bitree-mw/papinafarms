<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ApiFoundationTest extends TestCase
{
    public function test_unknown_api_route_returns_json_without_an_accept_header(): void
    {
        config(['app.debug' => false]);

        $this->get('/api/v1/not-implemented')
            ->assertNotFound()
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonStructure(['message'])
            ->assertJsonMissingPath('trace');
    }

    public function test_api_middleware_limits_requests(): void
    {
        // This infrastructure probe is never registered outside the test process.
        Route::middleware('api')->get('/api/v1/_test/rate-limit', fn () => response()->noContent());

        for ($attempt = 0; $attempt < 60; $attempt++) {
            $this->getJson('/api/v1/_test/rate-limit')->assertNoContent();
        }

        $this->getJson('/api/v1/_test/rate-limit')
            ->assertStatus(429)
            ->assertHeader('Retry-After');
    }
}
