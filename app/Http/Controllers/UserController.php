<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Thực hiện logout
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        Auth::logout();
        return redirect()->to('http://domain-auth.com/logout?redirect_url=domain-1.com'); // Chuyển hưởng tới server auth để thực hiện logout
    }
}
