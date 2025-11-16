@extends('layout.header')
@title('Berlangganan')
@section('content')
    <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4 col-sm-6 col-xl-4">
                    <div class="card text-center p-4 border-primary">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Paling Laris</span>
                            <h5 class="card-title text-primary">PREMIUM</h5>
                            <h2 class="card-title fw-bold my-3">Rp 99.000</h2>
                            <ul class="list-unstyled my-4">
                                <li><i class="mdi mdi-marker-check text-success"></i> Semua Desain Terbuka</li>
                                <li><i class="mdi mdi-marker-check text-success"></i> Tanpa Batas Tamu</li>
                                <li><i class="mdi mdi-marker-check text-success"></i> Fitur Galeri Foto & Video</li>
                                <li><i class="mdi mdi-marker-check text-success"></i> Bebas Iklan</li>
                            </ul>
                            <a href="{{ route('payment.create') }}" class="btn btn-primary w-100">Pilih Paket</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xl-4">
                    <div class="card text-center p-4 border-primary">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Paling Laris</span>
                            <h5 class="card-title text-primary">PREMIUM</h5>
                            <h2 class="card-title fw-bold my-3">Rp 99.000</h2>
                            <ul class="list-unstyled my-4">
                                <li><i class="mdi mdi-marker-check text-success"></i> Semua Desain Terbuka</li>
                                <li><i class="mdi mdi-marker-check text-success"></i> Tanpa Batas Tamu</li>
                                <li><i class="mdi mdi-marker-check text-success"></i> Fitur Galeri Foto & Video</li>
                                <li><i class="mdi mdi-marker-check text-success"></i> Bebas Iklan</li>
                            </ul>
                            <a href="{{ route('payment.create') }}" class="btn btn-primary w-100">Pilih Paket</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xl-4">
                    <div class="card text-center p-4 border-primary">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Paling Laris</span>
                            <h5 class="card-title text-primary">PREMIUM</h5>
                            <h2 class="card-title fw-bold my-3">Rp 99.000</h2>
                            <ul class="list-unstyled my-4">
                                <li><i class="mdi mdi-marker-check text-success"></i> Semua Desain Terbuka</li>
                                <li><i class="mdi mdi-marker-check text-success"></i> Tanpa Batas Tamu</li>
                                <li><i class="mdi mdi-marker-check text-success"></i> Fitur Galeri Foto & Video</li>
                                <li><i class="mdi mdi-marker-check text-success"></i> Bebas Iklan</li>
                            </ul>
                            <a href="{{ route('payment.create') }}" class="btn btn-primary w-100">Pilih Paket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
