<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function imagePayment(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'id' => 'required|exists:payments,id'
        ]);

        // dd($request);

        $payment = Payment::findOrFail($request->id);

        $oldPath = $payment->bukti_pembayaran;

        $path = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        $payment->update([
            'bukti_pembayaran' => $path,
        ]);

        if ($oldPath) {
            Storage::disk('public')->delete($oldPath);
        }

        return redirect()->route('riwayat')->with('success', 'Bukti pembayaran berhasil di-update.');
    }

    public function konfirmasi(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $payment = Payment::findOrFail($request->id);

        $payment->update([
            'status' => 1
        ]);

        return redirect()->route('riwayat')->with('success', 'Status berhasil di-update.');

    }
}
