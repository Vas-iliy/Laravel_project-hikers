<?php

namespace App\Core\services;

use App\Core\repositories\UserRepository;
use App\Http\Requests\LoginUser;
use App\Http\Requests\RegisterUser;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function create(RegisterUser $request )
    {
        return User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function attempt(LoginUser $request)
    {
        return Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
    }

    public function login($user)
    {
        event(new Registered($user));
        Auth::login($user);
    }

    public function logout()
    {
        Auth::logout();
    }

}
