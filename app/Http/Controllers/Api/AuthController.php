<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\Http\Traits\ResponseTraits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponseTrait;
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

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $user = $request->user();
            $success['token'] = $user->createToken('questionnaire')->plainTextToken;
            return $this->successResponse(new LoginResource($success), 'User Login Sucessfully', 200);
        } else {
            return $this->failureResponse(400);
        }
    }
}
