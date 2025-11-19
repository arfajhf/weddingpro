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
        $user = Auth::user();

        if($user->role == 'user'){
            $weddingCollection = UserWadding::where('user_id', $user->id)->get();
            $data = [
                'wedings' => $weddingCollection,
                'coun' => $weddingCollection->count()
            ];

            return view('dashboardUser', compact('data'));
        }

    }

}
