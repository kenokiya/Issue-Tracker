<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;

class NotificationController extends Controller
{
    //All notifications count controller function
    public function notification()
    {
        if (auth('sanctum')->check()) {
            $user_id = auth('sanctum')->user()->id;

            $problems = Problem::where('targeted_id', $user_id)->where('notification', '0')->get();
            $notificationCount = $problems->count();
            return response()->json([
                'status' => 200,
                'notificationCount' => $notificationCount,
            ]);
        }
    }

    //Todays notification count function
    public function todaysNotificationCount()
    {
    }

    //Todays notification function
    public function todaysNotification()
    {
    }

    //This week's notification function
    public function weekNotification()
    {
    }
}
