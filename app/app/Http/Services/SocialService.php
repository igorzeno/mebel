<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialService
{
    public function SaveUser($user){

        //$email = $user->getEmail();
        $email =  fake()->unique()->safeEmail();
        $name = $user->getName();
        $avatar = $user->getAvatar();
        $password = Hash::make('111111111');

        $u = User::firstOrCreate(
            ['name' => $name],
            [
                'password' => $password,
                'email' => 'test@email.ru',
                'name' => $name,
                'avatar' => $avatar,
            ]
        );

        return $u;
    }

}
