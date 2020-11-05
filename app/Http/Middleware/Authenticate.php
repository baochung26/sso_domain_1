<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->input('token')){ // Nếu có token thực hiện login
            $user = User::where('auth_token', $request->input('token'))->first();
            if ($user){
                Auth::loginUsingId($user->id);
                return false;
            }
        }
        // Nếu không thể login thì hãy chuyển hướng đến server thực hiện authenticate kèm theo redirect back url
        return 'http://domain-auth.com/login?redirect_url=domain-1.com';
    }
}
