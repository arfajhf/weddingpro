<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Enums\UserRole;
use App\Models\UserWadding;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {


        if(Auth::user()->role === UserRole::User){
            
        }

        return view('dashboard');
    }

}
