<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{    
    /**
     * Handles user login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
        {
            $user = $request->user();
            $success['token'] = $user->createToken('questionnaire')->plainTextToken;
            $name = $user->name;
            $response = [
                'success' => 'true',
                'data' => $success,
                'message' => 'User Login Sucessfully',
            ];
            return response()->json($response,200);
        }
        else{
            return response()->json(['success'=>'false','message'=>'Invalid Credentials'],401);
        }
    }
}
