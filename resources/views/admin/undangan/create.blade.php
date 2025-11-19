@extends('layout.header')
@title('Buat Undangan')
@section('content')

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success custom-alert" role="alert">
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger custom-alert" role="alert">
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger custom-alert" role="alert">
                <strong>Error!</strong>
                <span>Tolong tinjau kembali input yang Anda masukkan.</span>
            </div>
        @endif
        <h4 class="card-title">Buat Undangan</h4>
        <div class="row">
            <div class="col col-12">
                <form class="m-t-20" action="{{ route('undangan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Template</label>
                                <select name="template" class="form-control" required>
                                    <option value="" disabled>Select an template</option>
                                    <option value="weddingpro-1" {{ (old('template') == 'weddingpro-1') ? 'selected' : '' }}>WeddingPro 1</option>
                                    <option value="weddingpro-2" {{ (old('template') == 'weddingpro-2') ? 'selected' : '' }}>WeddingPro 2</option>
                                    <option value="weddingpro-3" {{ (old('template') == 'weddingpro-3') ? 'selected' : '' }}>WeddingPro 3</option>
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
                                <input type="text" class="form-control @error('nama_pria') is-invalid @enderror" name="nama_pria" value="{{ old('nama_pria') }}" autofocus>
                                @error('nama_pria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Wanita</label>
                                <input type="text" class="form-control @error('nama_wanita') is-invalid @enderror" name="nama_wanita" value="{{ old('nama_wanita') }}">
                                @error('nama_wanita')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Akad</label>
                                <input type="date" class="form-control @error('tanggal_akad') is-invalid @enderror" name="tanggal_akad" value="{{ old('tanggal_akad') }}">
                                @error('tanggal_akad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Waktu Akad </label>
                                <input type="time" class="form-control @error('waktu_akad') is-invalid @enderror" name="waktu_akad" value="{{ old('waktu_akad') }}">
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
                                <input type="date" class="form-control @error('tanggal_resepsi') is-invalid @enderror" name="tanggal_resepsi" value="{{ old('tanggal_resepsi') }}">
                                @error('tanggal_resepsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Waktu Resepsi</label>
                                <input type="time" class="form-control @error('waktu_resepsi') is-invalid @enderror" name="waktu_resepsi" value="{{ old('waktu_resepsi') }}">
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
                                <input type="text" class="form-control @error('alamat_akad') is-invalid @enderror" name="alamat_akad" value="{{ old('alamat_akad') }}">
                                @error('alamat_akad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Resepsi (link)</label>
                                <input type="text" class="form-control @error('alamat_resepsi') is-invalid @enderror" name="alamat_resepsi" value="{{ old('alamat_resepsi') }}">
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
                                <input type="text" class="form-control @error('gmaps_akad') is-invalid @enderror" name="gmaps_akad" value="{{ old('gmaps_akad') }}">
                                @error('gmaps_akad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Google Maps Resepsi (link)</label>
                                <input type="text" class="form-control @error('gmaps_resepsi') is-invalid @enderror" name="gmaps_resepsi" value="{{ old('gmaps_resepsi') }}">
                                @error('gmaps_resepsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Pria</label>
                                <input type="file" class="form-control @error('foto_pria') is-invalid @enderror" name="foto_pria">
                                @error('foto_pria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Wanita</label>
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
                                <label>Foto Sampul </label>
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
                                <input type="text" class="form-control @error('ortu_pria') is-invalid @enderror" name="ortu_pria" value="{{ old('ortu_pria') }}">
                                @error('ortu_pria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Ortu Wanita</label>
                                <input type="text" class="form-control @error('ortu_wanita') is-invalid @enderror" name="ortu_wanita" value="{{ old('ortu_wanita') }}">
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
                                <input type="number" class="form-control @error('no_rekening') is-invalid @enderror" name="no_rekening" value="{{ old('no_rekening') }}">
                                @error('no_rekening')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Pemilik</label>
                                <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik" value="{{ old('nama_pemilik') }}">
                                @error('nama_pemilik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank" value="{{ old('nama_bank') }}">
                                @error('nama_bank')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Pesan</button>
                    </div>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>

@endsection
