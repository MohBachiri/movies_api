<?php

namespace App\Http\Controllers\Api;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    public function registration(Request $request)
    {

            $validator = Validator::make($request->all(), [
                'username'=>'required|string|unique:users,username',
                'password'=>'required|min:8'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(),'status'=>"forbidden"], 403);
            }
                $user = User::create([
                'username' => $request['username'],
                'password' => Hash::make($request['password']),
                ]);
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json(['access_token' => $token,'messages' => 'sign up Successfully','status'=>'OK', 'token_type' => 'Bearer',], 200);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'=>'required|string|exists:users,username',
            'password'=>'required|min:8'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(),'status'=>"forbidden"], 403);
        }
            if (Auth::attempt($request->only('password', 'password'))) {
                   return response()->json([
                    'message' => 'Login information is invalid.','status'=>'Unauthorized'], 401);
            }
            $user = User::where('username', $request['username'])->firstOrFail();
                    $token = $user->createToken('authToken')->plainTextToken;
                    return response()->json(['access_token' => $token,'status'=>'OK', 'token_type' => 'Bearer'], 200);
    }
    // method for user logout and delete token
    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();
        return [
            'message' => 'logged out'
        ];
    }
}
