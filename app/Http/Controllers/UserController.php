<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function userNotifications()
    {
        $user = User::first();
        $notification = Notification::send($user, new WelcomeNotification);
        return response()->json(['message' => 'Notification sent!']);
    }
}
