<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserApiTest extends TestCase
{
	use DatabaseMigrations;

	public function test_api_return_index_data()
	{
		$user = $this->createUser();

		$users = factory(\App\User::class, 3)->create();

		$response = $this->actingAs($user, 'api')
			->json('GET', "{$this->API}/users");

		$response->assertStatus(200)
			->assertJson(['recordsTotal' => $users->count() + 1,]);
	}
}
