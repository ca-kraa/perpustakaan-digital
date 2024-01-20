<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'username' => ['required', 'string', 'max:255', Rule::unique('users')],
                'namaLengkap' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'username' => $request->username,
                'namaLengkap' => $request->namaLengkap,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'bearer_token' => Str::random(60),
            ]);

            event(new Registered($user));

            Auth::login($user);

            return response()->json([
                'user' => $user,
            ], 201);    
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation Failed',
                'messages' => $e->errors(),
            ], 422);
        }
    }
}
