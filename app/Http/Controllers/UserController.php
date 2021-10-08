<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserProfileRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user-profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserProfileRequest $request, User $profile)
    {
        $this->authorize('update', $profile);

        $profile->fill($request->validated());

        if ($request->has('avatar') && !empty($request->file('avatar'))) {
            $profile->avatar = $request->file('avatar')->store('avatars');
        }

        if ($request->has('password')) {
            $profile->password = Hash::make($request->password);
        }

        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile Updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(PasswordUpdateRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password Updated!');
    }
}
