<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::query()
            ->where('email', '=', $request->get('email'))
            ->first();

        if (is_null($user)) {
            return to_route('show-login')->withErrors(['loginError' => 'Uživatel se zadanými údaji neexistuje']);
        }

        if (!Hash::check($request->get('password'), $user->password)) {
            return to_route('show-login')->withErrors(['loginError' => 'Zadali jste špatné heslo']);
        }

        Auth::login($user);

        return to_route('homepage');

    }

    public function register(RegisterRequest $request)
    {
        $user = new User();

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        Auth::login($user);

        return to_route('homepage');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('homepage');
    }
}