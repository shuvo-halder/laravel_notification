<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use App\Notifications\PostAlartNotification;
use App\Notifications\UserFollowNotification;
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

    public function postNotifications(){
        $users = User::all();

        $post = [
            'title' => 'New Post',
            'slug' => 'new-post',
        ];
        
        foreach ($users as $user){
            Notification::send($user, new PostAlartNotification($post));
        }

        $singleUser = User::first();

        $user->notify(new PostAlartNotification($post));

        return response()->json(['message' => 'Notification sent!']);
    }

    public function UserFollowNotification(Request $request){
        $user = User::first();

        if(auth()->user()){

            auth()->user()->notify(new UserFollowNotification($user));

        }

        return response()->json(['message' => 'Follow successfully!']);

    }
}
