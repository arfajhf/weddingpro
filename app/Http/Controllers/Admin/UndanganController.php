<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Http\Requests\Undangan\UndanganRequest;
use App\Models\UserWadding;

use Illuminate\Support\Facades\Auth;

class UndanganController extends Controller
{
    public function index(Request $request)
    {
        $undangans = $request->user()->waddings()->latest()->paginate(12);
        return view('admin.undangan.index', compact('undangans'));
    }

    public function show(Request $request, string $slug)
    {
        $undangan = UserWadding::where('slug', $slug)->with('galeries')->first() or abort(404);
        $galeri = $undangan->galeries->first();

        return view("template.{$undangan->template}", compact('undangan', 'galeri'));
    }
    public function create(Request $request)
    {
        return view('admin.undangan.create');
    }

    public function store(UndanganRequest $request): RedirectResponse
    {
        $input = $request->validated();

        if ($request->hasFile('foto_pria')) {
            $input['foto_pria'] = $request->file('foto_pria')->store('images', 'public');
        }

        if ($request->hasFile('foto_wanita')) {
            $input['foto_wanita'] = $request->file('foto_wanita')->store('images', 'public');
        }

        if ($request->hasFile('foto_hero')) {
            $input['foto_hero'] = $request->file('foto_hero')->store('images', 'public');
        }

        $input['user_id'] = Auth::user()->id;
        /* \Log::info('UndanganController store:', $input); */

        UserWadding::create($input);

        return redirect()->route('undangan.index')->with('success', 'Undangan berhasil dibuat');
    }

    public function edit(UserWadding $undangan)
    {
        return view('admin.undangan.edit', compact('undangan'));
    }

    public function update(UndanganRequest $request, UserWadding $undangan): RedirectResponse
    {
        $input = $request->validated();

        if ($request->hasFile('foto_pria')) {
            if ($undangan->foto_pria) {
                Storage::disk('public')->delete($undangan->foto_pria);
            }
            $input['foto_pria'] = $request->file('foto_pria')->store('images', 'public');
        }

        if ($request->hasFile('foto_wanita')) {
            if ($undangan->foto_wanita) {
                Storage::disk('public')->delete($undangan->foto_wanita);
            }
            $input['foto_wanita'] = $request->file('foto_wanita')->store('images', 'public');
        }

        if ($request->hasFile('foto_hero')) {
            if ($undangan->foto_hero) {
                Storage::disk('public')->delete($undangan->foto_hero);
            }
            $input['foto_hero'] = $request->file('foto_hero')->store('images', 'public');
        }

        if (($input['nama_pria'] ?? null) !== $undangan->nama_pria || ($input['nama_wanita'] ?? null) !== $undangan->nama_wanita) {
            $input['slug'] = $undangan::generateUniqueSlug($input['nama_pria'] ?? $undangan->nama_pria, $input['nama_wanita'] ?? $undangan->nama_wanita, $undangan->id);
        }

        $undangan->update($input);

        return redirect()->route('undangan.index')->with('success', 'Undangan berhasil diperbarui');
    }

    public function destroy(UserWadding $undangan): RedirectResponse
    {
        if ($undangan->foto_pria) {
            Storage::disk('public')->delete($undangan->foto_pria);
        }
        if ($undangan->foto_wanita) {
            Storage::disk('public')->delete($undangan->foto_wanita);
        }
        if ($undangan->foto_hero) {
            Storage::disk('public')->delete($undangan->foto_hero);
        }

        $undangan->delete();

        return redirect()->back()->with('success', 'Undangan berhasil dihapus');
    }
}
