<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'username' => ['required', 'string', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ], [
                'username.required' => 'Username is required.',
                'username.string' => 'Username must be a string.',
                'username.unique' => 'Sorry, username already exists.',
                'password.required' => 'Password is required.',
                'password.confirmed' => 'Password and  confirmation do not match.',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();

                $response = [
                    'success' => false,
                    'errors' => $errors,
                ];
            } else {
                $user = User::create([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                ]);

                event(new Registered($user));

                Auth::login($user);

                $response = [
                    'success' => true,
                    'redirect' => RouteServiceProvider::HOME,
                ];
            }

            return response()->json($response);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
