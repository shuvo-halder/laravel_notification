<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notification\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
