<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(UpdateUserProfileRequest $request)
    {
        $user = Auth::user();

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');

        if (!is_null($request->get('password'))) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        return to_route('profile.show');
    }
}
