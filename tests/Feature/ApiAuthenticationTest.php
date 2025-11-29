<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_register_and_receive_api_token(): void
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => 'API User',
            'email' => 'apiuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response
            ->assertCreated()
            ->assertJsonStructure([
                'token',
                'user' => ['id', 'name', 'email'],
            ]);

        $this->assertDatabaseHas('users', [
            'email' => 'apiuser@example.com',
        ]);
    }

    public function test_users_can_login_and_receive_api_token(): void
    {
        $password = 'secret123';
        User::factory()->create([
            'email' => 'tester@example.com',
            'password' => Hash::make($password),
        ]);

        $response = $this->postJson('/api/auth/login', [
            'email' => 'tester@example.com',
            'password' => $password,
        ]);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'token',
                'user' => ['id', 'name', 'email'],
            ]);
    }

    public function test_authenticated_users_can_fetch_their_profile(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('api-token')->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer '.$token)
            ->getJson('/api/auth/user');

        $response
            ->assertOk()
            ->assertJsonPath('user.id', $user->id);
    }

    public function test_authenticated_users_can_logout_and_revoke_token(): void
    {
        $user = User::factory()->create();
        $newAccessToken = $user->createToken('api-token');
        $tokenId = $newAccessToken->accessToken->id;
        $plainTextToken = $newAccessToken->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer '.$plainTextToken)
            ->postJson('/api/auth/logout');

        $response
            ->assertOk()
            ->assertJson(['message' => 'Successfully logged out.']);

        $this->assertDatabaseMissing('personal_access_tokens', [
            'id' => $tokenId,
        ]);
    }
}
