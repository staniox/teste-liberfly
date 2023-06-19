<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserTest extends TestCase
{

    public function test_user_creation_returns_true(): void
    {
        $user = [
            "name" => "teste",
            "email" => "teste@teste.com.br",
            "password" => "teste123",
            "password_confirmation" => "teste123"
        ];


        $response = $this->post('/api/user', $user);

        $response->assertStatus(200);
    }

    public function test_user_get_all_returns_true(): void
    {
        $users = User::factory()->count(5)->create();

        $user = User::first();
        $token = JWTAuth::fromUser($user);
        $headers = [
            'Authorization' => 'Bearer ' . $token
        ];

        $response = $this->get('/api/users', $headers);

        $response->assertJsonCount(6);
    }

    public function test_user_get_by_id_returns_true(): void
    {

        $user = User::first();
        $token = JWTAuth::fromUser($user);
        $headers = [
            'Authorization' => 'Bearer ' . $token
        ];

        $response = $this->get('/api/user/' . $user->id, $headers)->decodeResponseJson();

        $this->assertSame($user->id, $response['id']);
    }

    public function test_user_get_by_id_returns_false(): void
    {
        $stringValidate = 'usuário não encontrado';

        $user = User::query()->orderBy('id', 'desc')->first();
        $token = JWTAuth::fromUser($user);
        $headers = [
            'Authorization' => 'Bearer ' . $token
        ];

        $userId = $user->id . 1 ;

        $response = $this->get('/api/user/' . $userId, $headers)->decodeResponseJson();
        $this->assertSame($response['error'], $stringValidate);
    }

    public function test_user_destroy_returns_true(): void
    {
        $user = User::first();
        $token = JWTAuth::fromUser($user);
        $headers = [
            'Authorization' => 'Bearer ' . $token
        ];
        $userId = $user->id;

        $response = $this->delete('/api/user/' . $userId, [], $headers);

        $response->assertStatus(200);

        User::truncate();
    }
}
