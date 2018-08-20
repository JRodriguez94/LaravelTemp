<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;

   public function testUserIndex()
   {
       $user = factory(User::class)->create();

       $response = $this->actingAs($user)
           ->get('/users');

       $response->assertStatus(200);
   }

   public function testUserCreate()
   {
       $user = factory(User::class)->create();

       $response = $this->actingAs($user)
           ->get("users/create");

       $response->assertStatus(200);
   }

   public function testUserStore()
   {
       $user = factory(User::class)->create();

       $newUser = $this->newUser();
       $response = $this->actingAs($user)
           ->json('POST', '/users', $newUser);

       $this->assertDatabaseHas('users', [
           'username' => $newUser['username'],
           'email' => $newUser['email'],
       ]);

       $response->assertRedirect('users');
   }

   public function testUserShow()
   {
       $user = factory(User::class)->create();

       $newUser = $this->createUser($this->newUser());
       $response = $this->actingAs($user)
           ->get("users/{$newUser->id}");

       $response->assertStatus(200);
   }

    public function testUserEdit()
    {
        $user = factory(User::class)->create();

        $newUser = $this->createUser($this->newUser());
        $response = $this->actingAs($user)
            ->get("users/{$newUser->id}/edit");

        $response->assertStatus(200);

        $response->assertViewHas('user');
    }

   public function testUserUpdate()
   {
       $user = factory(User::class)->create();

       $otherUser = $this->createUser($this->newUser());

       $otherUser->username = 'New Name';

       $response = $this->actingAs($user)
           ->json('PUT', "/users/{$otherUser->id}", $otherUser->toArray());

       $this->assertDatabaseHas('users', [
           'username' => $otherUser->username,
           'email' => $otherUser->email,
       ]);

       $response->assertRedirect('users');
   }

   public function testUserDelete()
   {

       $user = factory(User::class)->create();

       $otherUser = $this->createUser($this->newUser());

       $response = $this->actingAs($user)
           ->delete("users/{$otherUser->id}");

       $this->assertDatabaseMissing('users', $otherUser->toArray());

       $response->assertStatus(200);
   }

    public function newUser()
    {
        return [
            'username' => 'Waskalle',
            'last_name' => 'Caro',
            'second_last_name' => 'Bahena',
            'street' => 'Calle de los milagros',
            'outside_number' => 1514,
            'interior_number' => null,
            'neighborhood' => 'Villa Fontana',
            'postal_code' => 45130,
            'city' => 'tlaquepaque',
            'state' => 'Jalisco',
            'phonenumber' => '33221100',
            'cellphone' => '3313121412',
            'base_salary' => 234.32,
            'status' => 1,
            'email' => 'waskalle.bahena94@example.com',
            'password' => 'secret'
        ];
    }

    public function createUser($newUser = null)
    {
        if ($newUser) {
            $newUser = (object) $newUser;
        }
        $user = new User;

        $user->username = $newUser ? $newUser->username : 'Miguel Angel';
        $user->last_name = $newUser ? $newUser->last_name : 'Caro';
        $user->second_last_name = $newUser ? $newUser->second_last_name : 'Bahena';
        $user->street = $newUser ? $newUser->street : 'Av.Mexico';
        $user->outside_number = $newUser ? $newUser->outside_number : '451';
        $user->interior_number = $newUser ? $newUser->interior_number : '20A';
        $user->neighborhood = $newUser ? $newUser->neighborhood : 'Colomitos';
        $user->postal_code = $newUser ? $newUser->postal_code : '45130';
        $user->city = $newUser ? $newUser->city : 'Zapopan';
        $user->state = $newUser ? $newUser->state : 'Jalisco';
        $user->phonenumber = $newUser ? $newUser->phonenumber : '36703917';
        $user->cellphone = $newUser ? $newUser->cellphone : '3313107159';
        $user->base_salary = $newUser ? $newUser->base_salary : 345.20;
        $user->status = $newUser ? $newUser->status : '1';
        $user->email = $newUser ? $newUser->email : 'miguel.caro@nuvemtecnologia.mx';
        $user->password = bcrypt($newUser ? $newUser->password : 'secret');
        //$user->rol = $newUser ? $newUser->rol : 2;
        $user->save();
        $user->attachRole(Role::find(2));

        return $user;
    }
}
