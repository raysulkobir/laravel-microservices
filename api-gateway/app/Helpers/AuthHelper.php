<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;




class AuthHelper
{

    protected static $AUTH_SERVICE_URL = "http://127.0.0.1:8001/api";

    public static function validateToken(Request $request)
    {
        $token = $request->headers->get('Authorization');

        //TODO Check if the token is present
        if (!$token) {
            return response()->json(['message' => 'Access Denied. No token provided.'], 401);
        }

        //TODO Forward the token to the auth-service for verification
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->post(self::$AUTH_SERVICE_URL . "/verifyToken");

        //TODO Check the response from the auth-service
        if ($response->status() === 200 && $response->json()['status'] === true) {
            return ['valid' => true];
        }else{
            return ['valid' => false];
        }
    }
}

