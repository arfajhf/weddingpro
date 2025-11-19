<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\UserWadding;
use App\Models\Ucapan;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'user'){
            $weddingCollection = UserWadding::where('user_id', $user->id)->with('ucapans')->get();
            $ucapans = Ucapan::whereHas('wedding', function ($query) use($user) {
                $query->where('user_id', $user->id);
            })->get();
            $data = [
                'wedings' => $weddingCollection,
                'ucapans' => $ucapans,
                'count' => $weddingCollection->count()
            ];

            return view('dashboard-user', compact('data'));
        } else {
            $users = User::where('role', 'user')->count();
            $weddings = UserWadding::count();
            $payments = Payment::where('status', 1)->count();
            return view('dashboard-admin', [
                'counts' => [
                    'users' => $users,
                    'invitations' => $weddings,
                    'payments' => $payments,
                ],
            ]);
        }
    }
}
