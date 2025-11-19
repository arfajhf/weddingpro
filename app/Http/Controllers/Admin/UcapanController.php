<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ucapan;
use Illuminate\Http\Request;

class UcapanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kehadiran' => 'required',
            'ucapan' => 'required',
            'id' => 'required'
        ]);

        Ucapan::create([
            'weding_id' => $request->id,
            'nama' => $request->nama,
            'ucapan' => $request->ucapan,
            'kehadiran' => $request->kehadiran,
        ]);

        return redirect()->back()->with('success', 'Ucapan Berhasil di Kirim');

    }
}
