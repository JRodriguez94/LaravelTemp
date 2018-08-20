<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    public function testLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/home');

        $response->assertStatus(200);
    }

    public function testPasswordReset()
    {
        $response = $this->call('post', 'password/email', ['email' => 'correo@example.com']);

        $response->assertRedirect();
    }
}
