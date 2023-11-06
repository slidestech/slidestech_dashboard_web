<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['token' => $user->createToken('API Token')->plainTextToken]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // throw ValidationException::withMessages([
            //     'errors' => ['The provided credentials are incorrect.'],
            // ]);
            if ($request->wantsJson()) {
                return response()->json(['errors' => ['The provided credentials are incorrect.']], 422);
            }
            return redirect()->back()->withErrors([
                'login' => 'The provided credentials are incorrect.',
            ]);
        }
        if ($request->wantsJson()) {
            return response()->json(['token' => $user->createToken('API Token')->plainTextToken]);
        }
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        // $request->user()->currentAccessToken()->delete();
        Auth::user()->currentAccessToken()->delete();

        // if ($request->wantsJson()) {
        //     return response()->json('Logged out');
        // }
        // return redirect()->route('user-login');
    }

    public function authenticate(Request $request)
    {


        return view('auth.login');
    }

}