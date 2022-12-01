<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterStoreRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class RegisteredUserController extends Controller {
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('auth.register');
    }

    /**
     * @throws ValidationException
     */
    public function store(RegisterStoreRequest $request) {

        $user = User::create([
            'first_name' => $request->get("first_name"),
            'last_name' => $request->get("last_name"),
            'email' => $request->get("email"),
            'is_customer' => true,
            'is_admin' => false,
            'password' => Hash::make($request->get("password")),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
