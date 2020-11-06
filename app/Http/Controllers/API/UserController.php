<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function update_profile(ProfileRequest $request)
    {
        try {
            $user = Auth::user();

            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->birthdate = $request->birthdate;

            $user->update();

            return successResponse(
                ['user' => $user],
                Lang::get('messages.success'),
                Lang::get('messages.profile_updated')
            );
        } catch (\Throwable $th) {
            return errorResponse(
                Lang::get('messages.failure'),
                Lang::get('messages.server_error'),
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $th->getMessage()
            );
        }
    }
}
