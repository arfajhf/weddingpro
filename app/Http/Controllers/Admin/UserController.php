<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = User::where('role', 'user')->get();
        $no = 1;
        return view('admin.user.index', compact('data', 'no'));
    }
}
