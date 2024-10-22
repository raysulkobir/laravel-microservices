<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //TODO Handle user registration
    public function register(Request $request)
    {
        //TODO Custom error messages for validation
        $customMessages = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
        ];

        //TODO Validate the request with custom messages
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ], $customMessages);

        try {
            //TODO Create the user if validation passes
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //TODO Return success response
            return response()->json([
                'message' => 'User registered successfully.',
            ], 201);
        } catch (\Exception $e) {
            //TODO Return error response if something goes wrong
            return response()->json([
                'error' => 'User registration failed. Please try again later.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    //TODO Handle user login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    //TODO Handle user logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully.']);
    }

    public function verifyToken(Request $request)
    {
        if ($user = $request->user()) {
            return response()->json([
                'status' => true,
                'message' => 'Token is valid',
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
                'user' => '',
            ], 401);
        }
    }

}
