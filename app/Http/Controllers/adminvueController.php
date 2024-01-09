<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminvueController extends Controller
{
    public function deconnection() {
        Auth::logout();
        return redirect()->route('login');
    }
    public function vueadmin() {
        return view('admin_vue.home');
    }
    public function verifiemail(){
        $email = null;
        $user = User::where('email',$email)
            ->frist();
    }
}
