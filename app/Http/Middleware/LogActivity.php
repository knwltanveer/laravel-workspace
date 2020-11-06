<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;

class LogActivity
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

        $log = [];
    	$log['url'] = $request->fullUrl();
    	$log['method'] = $request->method();
    	$log['ip'] = $request->ip();
    	$log['agent'] = $request->header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 1;
    	ActivityLog::create($log);

        return $next($request);
    }
}
