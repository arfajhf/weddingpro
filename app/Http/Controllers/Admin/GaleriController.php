<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\Galeri\GaleriRequest;

use App\Models\UserWadding;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function store(GaleriRequest $request, UserWadding $undangan): RedirectResponse
    {
        // autorisasi: pastiin pemilik
        if ($request->user()->id !== $undangan->user_id) {
            abort(403);
        }

        $data = $request->validated();

        // cari atau buat galeri untuk undangan ini
        $galeri = Galeri::firstOrNew(['weding_id' => $undangan->id]);

        // simpan file yang diupload (letakkan di folder galeri/<undangan-id>)
        foreach (range(1,6) as $i) {
            $key = 'image' . $i;
            if ($request->hasFile($key)) {
                // hapus file lama kalau ada
                if (!empty($galeri->{$key})) {
                    \Storage::disk('public')->delete($galeri->{$key});
                }
                $galeri->{$key} = $request->file($key)->store("galeri/{$undangan->id}", 'public');
            }
        }

        $galeri->weding_id = $undangan->id;
        $galeri->save();

        return redirect()->back()->with('success', 'Galeri berhasil diunggah');
    }
}
