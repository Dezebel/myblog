<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>['required','email','exists:users'],
            'password'=>['required','min:6'], 
        ]);
        
        $user = User::where('email',$data['email'])->first();
        
        if(!$user || !Hash::check($data['password'],$user->password)){
            return response()->json([
                'data'=>null,
                'message'=>'Wrong Credentials',
            ],401);
        }
        
        $token=$user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token'=>$token
        ]);
    }
}
