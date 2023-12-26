<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'cpr_number' => 'required|string|max:255|unique:users',
            'mobile_number' => 'required|string|max:255|unique:users',
            'password' => 'required|string',
            'confirm_password' => 'required|string',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'full_name' => $request->full_name,
            'cpr_number' => $request->cpr_number,
            'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password),
            'confirm_password' => Hash::make($request->password),

        ]);

        return response()->json(
            [

                "success" => true,
                "message" => "User Register Successfully",
                "data" => $user,
            ]
        );
    }

    public function login(Request $request)
    {
        $credentials = $request->only('cpr_number', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = $request->user();

        return response()->json([
            "success" => true,
            "data" => $user,

        ], 200);
    }
}
