<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.dashboard');
    }

    public function profile(){
        $user = auth()->user();
        return view('admin.akun',compact('user'));
    }

}
