<?php

namespace Backend\Modules\Notifications\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Backend\Modules\Notifications\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()
            ->paginate(10);

        return view(
            'notifications.index',
            compact('notifications')
        );
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        Notification::create([

            'notification_no' => $request->notification_no,
            'title' => $request->title,
            'message' => $request->message,
            'module_name' => $request->module_name,
            'user_id' => $request->user_id,
            'status' => $request->status,

            'created_by' => auth()->id() ?? 1,
            'updated_by' => auth()->id() ?? 1
        ]);

        return redirect()
            ->route('notifications.index');
    }
}