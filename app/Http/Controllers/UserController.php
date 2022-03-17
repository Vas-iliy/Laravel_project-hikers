<?php

namespace App\Http\Controllers;

use App\Core\repositories\UserRepository;
use App\Core\services\UserService;
use App\Http\Requests\LoginUser;
use App\Http\Requests\RegisterUser;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $users;
    private $service;

    public function __construct(UserRepository $users, UserService $service)
    {
        $this->users = $users;
        $this->service = $service;
    }

    public function register()
    {
        return view('front.user.register');
    }

    public function store(RegisterUser $request)
    {
        $user = $this->service->create($request);
        if ($user) {
            $this->service->login($user);
        }
        return redirect()->home()->with('success', 'Регистрация пройдена! пожалуйста, подтвердите E-mail!');
    }

    public function loginForm()
    {
        return view('front.user.login');
    }

    public function login(LoginUser $request)
    {
        if ($this->service->attempt($request)) {
            session()->flash('success', 'You are logged');
            $user = $this->users->getId(Auth::id());
            if ($user->role->role == 'admin') {
                return redirect()->route('admin.index');
            }
            return redirect()->home();
        }
        return redirect()->back()->with('error', 'Incorrect login or password');
    }

    public function logout()
    {
        $this->service->logout();
        return redirect()->home();
    }

    public function show()
    {
        return view('front.user.show');
    }
}
