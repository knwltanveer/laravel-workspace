<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ActivityLogController extends Controller
{
    public function logActivityLists()
    {
        $user = Auth::user();
        $logs = $user->activitylog;

        return successResponse(
            ['success' => true, 'logs' => $logs],
            Lang::get('messages.success'),
            Lang::get('messages.list_logs'),
        );
    }
}
