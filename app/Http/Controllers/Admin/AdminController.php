<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('admin.admin-login');
    }
    public function index()
    {
        return view('admin.index');
    }
    public function user()
    {
        return view('user.index');
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
