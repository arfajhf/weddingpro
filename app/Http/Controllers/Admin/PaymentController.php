<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->path();
        $user = Auth::user()->id;

        if (Auth::user()->role == 'admin') {
            if ($path == 'konfirmasi') {
                $data = Payment::where('status', 0)->get();
                // $data = 'konfirmasi';
            } else {
                $data = Payment::where('status', 1)->get();
                // $data = 'selesai';
            }
        } else {
            $data = Payment::where('user_id', $user)->get();
        }

        return view('admin.payment.index', compact('data'));
    }

    public function berlangganan()
    {
        return view('admin.payment.langganan');
    }

    public function create()
    {
        return view('admin.payment.createP');
    }

    public function store(Request $request)
    {
        $request->validate([
            'paket' => 'required',
            'jumlah' => 'required',
            'kode' => 'required'
        ]);

        $user = Auth::user()->id;
        $status = 0;

        Payment::create([
            'user_id' => $user,
            'kode' => $request->kode,
            'status' => $status,
            'jumlah' => $request->jumlah,
            'paket' => $request->paket
        ]);

        return redirect()->route('riwayat')->with('success', 'Pembayaran Berhasil');
    }
}
