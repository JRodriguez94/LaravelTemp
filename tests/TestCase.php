<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $API = '/api/v1';

    public function createUser($newUser = null)
    {
        if ($newUser) {
            $newUser = (object) $newUser;
        }
        $user = new User;
        $user->name = $newUser ? $newUser->name : 'Misty Wilson';
        $user->email = $newUser ? $newUser->email : 'misty.wilson44@example.com';
        $user->password = bcrypt(data_get($newUser, 'password', '#Password123'));
//        $user->password = bcrypt($newUser ? $newUser->password : '#Password123');
        $user->save();
        return $user;
    }

    public function newUser()
    {
        return [
            'name' => 'Amelia Lawrence',
            'email' => 'amelia.lawrence94@example.com',
            'password' => '#Password123',
            'password_confirmation' => '#Password123',
        ];
    }
}
