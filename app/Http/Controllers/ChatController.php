<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatUser;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('user')) {
            return view("chat");
        } else {
            return redirect('/');
        }

    }

    public function setUserSession(Request $request)
    {
        if($request->input("username") == "") {
            return redirect("/");
        }

        $user = ChatUser::where('username', $request->input('username'))->where('ip', $request->ip())->first();
        if($user === null) {
            // create new user and login as newly created user
            $newUser = new ChatUser;
            $newUser->username = $request->username;
            $newUser->ip = $request->ip();
            $newUser->save();

            $user = ChatUser::where('username', $request->input('username'))->where('ip', $request->ip())->first();
        }

        $request->session()->put('user', [
            'id' => $user->id,
            'username' => $user->username,
            'ip' => $user->ip
        ]);
        return redirect('chat/' . $user->id);

    }

    public function unsetUserSession(Request $request)
    {
        $request->session()->remove('user');

        return redirect('/');
    }

}
