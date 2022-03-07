<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('Auth Token')->accessToken;

        $user = new UserResource((object)$user ?? []);
        
        $result = [
            'message' => 'Register success!',
            'user' => $user,
            'token' => $token
        ];
        return response()->json($result, Response::HTTP_OK);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Email hoac mat khau khong chinh xac'
            ]);
        }
        $token = $user->createToken('Auth Token')->accessToken;
        $user = new UserResource($user);
        $result = [
            'message' => 'Success',
            'user' => $user,
            'token' => $token
        ];

        return response()->json($result, Response::HTTP_OK);
    }

    public function me()
    {
        $user = auth()->user()->only(['id', 'name', 'avatar', 'email']);
        $user = new UserResource((object)$user ?? []);
        return response()->json($user, Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
          ], Response::HTTP_OK);
    }
}
