<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;

class AgeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $age = Carbon::parse($request->birthdate)->age;
        if ($age < 18) {
            return errorResponse(
                Lang::get('messages.failure'),
                Lang::get('messages.age_limit'),
                Response::HTTP_PRECONDITION_FAILED
            );
        }
        return $next($request);
    }
}
