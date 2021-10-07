<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisteredUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Stevebauman\Location\Facades\Location;

class RegisterUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        $fillable = $request->validated();
        $fillable['password'] = Hash::make($request->password);
        $user = User::create($fillable);

        $location = Location::get();
        
        event(new RegisteredUser($user, $location));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
