<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
            'email'     => $request['email'],
            'password'  => $request['password']
        ])) {
            $id = Auth::id();
            $user = User::whereId($id)->first();
            $user->token = $user->createToken('devkind')->plainTextToken;
            return successResponse(
                ['success' => true, 'user' => $user],
                Lang::get('messages.success'),
                Lang::get('messages.welcome'),
            );
        }
        return errorResponse(Lang::get('messages.failure'), Lang::get('messages.error_signin'));
    }


    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'email' => $request->email,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'birthdate' => $request->birthdate,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);
            $user->token = $user->createToken('devkind')->plainTextToken;
            return successResponse(
                ['success' => true, 'user' => $user],
                Lang::get('messages.success'),
                Lang::get('messages.welcome'),
            );
        } catch (\Throwable $th) {
            return errorResponse(Lang::get('messages.failure'), Lang::get('messages.server_error'),Response::HTTP_INTERNAL_SERVER_ERROR, $th->getMessage());
        }
    }
}
