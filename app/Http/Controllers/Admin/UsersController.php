<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function detail(User $user)
    {
        $options = ['user' => 'Uživatel', 'admin' => 'Administrátor'];

        return view('admin.users.detail')->with(['user' => $user, 'roles' => $options]);
    }

    public function showCreate()
    {
        $options = ['user' => 'Uživatel', 'admin' => 'Administrátor'];
        return view('admin.users.new')->with(['roles' => $options]);
    }

    public function create(CreateUserRequest $request) {
        $user = new User();

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');
        $user->save();

        return redirect()->route('admin.users.detail', $user->id);
    }

    public function update(User $user, UpdateUserRequest $request) {
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');

        if(!is_null($request->get('password'))) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        //TODO: redirect
    }
}
