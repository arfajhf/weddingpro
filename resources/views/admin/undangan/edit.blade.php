
@extends('layout.header')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Undangan</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('undangan.update', $undangan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Template</label>
                        <select name="template" class="form-control @error('template') is-invalid @enderror" required>
                            <option value="" disabled>Select an template</option>
                            <option value="weddingpro-1" {{ (old('template', $undangan->template) == 'weddingpro-1') ? 'selected' : '' }}>WeddingPro 1</option>
                            <option value="weddingpro-2" {{ (old('template', $undangan->template) == 'weddingpro-2') ? 'selected' : '' }}>WeddingPro 2</option>
                            <option value="weddingpro-3" {{ (old('template', $undangan->template) == 'weddingpro-3') ? 'selected' : '' }}>WeddingPro 3</option>
                        </select>
                        @error('template')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Pria</label>
                        <input type="text" name="nama_pria" class="form-control @error('nama_pria') is-invalid @enderror"
                            value="{{ old('nama_pria', $undangan->nama_pria) }}">
                        @error('nama_pria') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Wanita</label>
                        <input type="text" name="nama_wanita" class="form-control @error('nama_wanita') is-invalid @enderror"
                            value="{{ old('nama_wanita', $undangan->nama_wanita) }}">
                        @error('nama_wanita') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- preview foto hero
            <div class="mb-3">
                <label class="d-block">Foto Sampul Sekarang</label>
                <img src="{{ $undangan->foto_hero ? Storage::url($undangan->foto_hero) : asset('images/placeholder-hero.png') }}"
                     alt="Sampul" style="max-width:240px; height:140px; object-fit:cover; border-radius:8px;">
            </div> --}}

            {{-- ganti foto_hero
            <div class="form-group mb-3">
                <label>Ganti Foto Sampul (opsional)</label>
                <input type="file" name="foto_hero" class="form-control @error('foto_hero') is-invalid @enderror">
                @error('foto_hero') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>--}}

            {{-- other fields: tanggal, waktu, alamat, dll. copy dari create.blade tapi pake old(..., $undangan->...) --}}
            {{-- ... --}}
            {{-- contoh tombol --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Akad</label>
                        <input type="date" class="form-control @error('tanggal_akad') is-invalid @enderror" name="tanggal_akad" value="{{ old('tanggal_akad', $undangan->tanggal_akad) }}">
                        @error('tanggal_akad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Waktu Akad </label>
                        <input type="time" class="form-control @error('waktu_akad') is-invalid @enderror" name="waktu_akad" value="{{ old('waktu_akad', $undangan->waktu_akad) }}">
                        @error('waktu_akad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Resepsi</label>
                        <input type="date" class="form-control @error('tanggal_resepsi') is-invalid @enderror" name="tanggal_resepsi" value="{{ old('tanggal_resepsi', $undangan->tanggal_resepsi) }}">
                        @error('tanggal_resepsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Waktu Resepsi</label>
                        <input type="time" class="form-control @error('waktu_resepsi') is-invalid @enderror" name="waktu_resepsi" value="{{ old('waktu_resepsi', $undangan->waktu_resepsi) }}">
                        @error('waktu_resepsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat Akad (link)</label>
                        <input type="text" class="form-control @error('alamat_akad') is-invalid @enderror" name="alamat_akad" value="{{ old('alamat_akad', $undangan->alamat_akad) }}">
                        @error('alamat_akad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat Resepsi (link)</label>
                        <input type="text" class="form-control @error('alamat_resepsi') is-invalid @enderror" name="alamat_resepsi" value="{{ old('alamat_resepsi', $undangan->alamat_resepsi) }}">
                        @error('alamat_resepsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Google Maps Akad (link)</label>
                        <input type="text" class="form-control @error('gmaps_akad') is-invalid @enderror" name="gmaps_akad" value="{{ old('gmaps_akad', $undangan->gmaps_akad) }}">
                        @error('gmaps_akad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Google Maps Resepsi (link)</label>
                        <input type="text" class="form-control @error('gmaps_resepsi') is-invalid @enderror" name="gmaps_resepsi" value="{{ old('gmaps_resepsi', $undangan->gmaps_resepsi) }}">
                        @error('gmaps_resepsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Foto Pria (opsional)</label>
                        <input type="file" class="form-control @error('foto_pria') is-invalid @enderror" name="foto_pria">
                        @error('foto_pria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Foto Wanita (opsional)</label>
                        <input type="file" class="form-control @error('foto_wanita') is-invalid @enderror" name="foto_wanita">
                        @error('foto_wanita')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Foto Sampul (opsional) </label>
                        <input type="file" class="form-control @error('foto_hero') is-invalid @enderror" name="foto_hero">
                        @error('foto_hero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Ortu Pria</label>
                        <input type="text" class="form-control @error('ortu_pria') is-invalid @enderror" name="ortu_pria" value="{{ old('ortu_pria', $undangan->ortu_pria) }}">
                        @error('ortu_pria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Ortu Wanita</label>
                        <input type="text" class="form-control @error('ortu_wanita') is-invalid @enderror" name="ortu_wanita" value="{{ old('ortu_wanita', $undangan->ortu_wanita) }}">
                        @error('ortu_wanita')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input type="number" class="form-control @error('no_rekening') is-invalid @enderror" name="no_rekening" value="{{ old('no_rekening', $undangan->no_rekening) }}">
                        @error('no_rekening')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik" value="{{ old('nama_pemilik', $undangan->nama_pemilik) }}">
                        @error('nama_pemilik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank" value="{{ old('nama_bank', $undangan->nama_bank) }}">
                        @error('nama_bank')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('undangan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
