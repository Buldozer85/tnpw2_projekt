<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request) {
        $user = User::query()
            ->where('role', '=', Role::ADMIN->value)
            ->where('email', '=', $request->get('email'))
            ->first();

        if(is_null($user)) {
            return redirect()->back()->withInput()->withErrors(['login-error' => 'Uživatel se zadanými údaji neexistuje']);
        }

        if(!Hash::check($request->get('password'), $user->password)) {
            return redirect()->back()->withInput()->withErrors(['login-error' => 'Zadali jste nesprávné heslo']);
        }

        Auth::login($user);

        return redirect()->route('admin.shows.shows');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.auth.show-login');
    }
}
