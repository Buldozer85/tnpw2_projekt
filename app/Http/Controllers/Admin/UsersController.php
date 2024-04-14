<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function detail(User $user)
    {
        $options = [Role::USER->value => Role::USER->label(), Role::ADMIN->value => Role::ADMIN->label()];

        return view('admin.users.detail')->with(['user' => $user, 'roles' => $options]);
    }

    public function showCreate()
    {
        $options = [Role::USER->value => Role::USER->label(), Role::ADMIN->value => Role::ADMIN->label()];
        return view('admin.users.new')->with(['roles' => $options]);
    }

    public function create(CreateUserRequest $request)
    {
        $user = new User();

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');
        $user->save();

        return redirect()->route('admin.users.detail', $user->id);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');

        if (!is_null($request->get('password'))) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        return redirect()->route('admin.users.detail', $user->id);
    }

    public function delete(User $user)
    {

        foreach ($user->reviews as $review) {
            Review::find($review->id)->delete();
        }


        $user->delete();

        return redirect()->back();
    }

    public function showProfile()
    {
        return view('admin.user.profile');
    }

    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $user = Auth::user();

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');

        if (!is_null($request->get('password'))) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        return redirect()->route('admin.users.detail', $user->id);
    }
}
