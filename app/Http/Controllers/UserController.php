<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserProfileRequest;

class UserController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->only(['show']);
    }

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

        if($request->has('avatar') && !empty($request->file('avatar'))) {
            $profile->avatar = $request->file('avatar')->store('avatars');
        }

        if($request->has('password')) {
            $profile->password = Hash::make($request->password);
        }

        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile Updated!');
    }

    /**
     * Show the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
        // return view('public.profile')->with('profile', $profile);
        return response()->json($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
