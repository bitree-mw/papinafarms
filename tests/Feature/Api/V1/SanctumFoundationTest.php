<?php

namespace Tests\Feature\Api\V1;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class SanctumFoundationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Test-only protected endpoint: no login/profile API is exposed by the app.
        Route::middleware(['api', 'auth:sanctum'])->get('/api/v1/_test/protected', function (Request $request) {
            abort_unless($request->user()->tokenCan('foundation:read'), 403);

            return response()->noContent();
        });
    }

    public function test_missing_authentication_returns_json_401(): void
    {
        $this->get('/api/v1/_test/protected')
            ->assertUnauthorized()
            ->assertJsonPath('message', 'Unauthenticated.');
    }

    public function test_valid_bearer_token_is_authenticated_and_stored_hashed(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('Foundation test', ['foundation:read']);
        [, $secret] = explode('|', $token->plainTextToken, 2);

        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_id' => $user->id,
            'token' => hash('sha256', $secret),
        ]);

        $this->withToken($token->plainTextToken)
            ->getJson('/api/v1/_test/protected')
            ->assertNoContent();
    }

    public function test_invalid_bearer_token_is_rejected(): void
    {
        $this->withToken('invalid-token')
            ->getJson('/api/v1/_test/protected')
            ->assertUnauthorized();
    }

    public function test_revoked_bearer_token_is_rejected(): void
    {
        $token = User::factory()->create()->createToken('Revoked test', ['foundation:read']);
        $token->accessToken->delete();

        $this->withToken($token->plainTextToken)
            ->getJson('/api/v1/_test/protected')
            ->assertUnauthorized();
    }

    public function test_token_without_required_ability_is_forbidden(): void
    {
        $token = User::factory()->create()->createToken('Limited test', []);

        $this->withToken($token->plainTextToken)
            ->getJson('/api/v1/_test/protected')
            ->assertForbidden();
    }
}
