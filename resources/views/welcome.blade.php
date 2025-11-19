<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Pro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdfcfa; /* Warna latar belakang yang lembut */
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 120px 0;
            margin-top: 56px; /* Tinggi navbar */
        }
        .hero-section h1 {
            font-weight: 700;
            font-size: 3rem;
        }
        .hero-section .lead {
            font-weight: 300;
            font-size: 1.25rem;
        }
        .hero-section .btn-light {
            padding: 12px 30px;
            font-weight: 600;
        }
        .section-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 40px;
        }
        .feature-icon {
            font-size: 3rem;
            color: #764ba2;
        }
        .card {
            border: none;
            box-shadow: 0 4px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .testimonial-card {
            background-color: #f8f9fa;
        }
        .testimonial-card img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .footer {
            background-color: #343a40;
            color: white;
        }
        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }
        .footer a:hover {
            color: white;
        }
        /* Penyesuaian untuk gambar mockup di hero section */
        .hero-img {
            /* max-width: 200%; */
            width: 60%;
            margin-left: 45% !important;
            border-radius: 0%;
            /* box-shadow: 0 10px 40px rgba(0,0,0,0.2); */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">💌 Wedding Pro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contoh">Contoh Desain</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#harga">Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-lg-3" href="{{route('login')}}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center text-lg-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Buat & Sebar Undangan Digital dalam Sekejap</h1>
                    <p class="lead my-4">Pilih dari ratusan template premium, kustomisasi sesukamu, dan bagikan ke semua tamu hanya dengan satu klik. Mudah, cepat, dan ramah lingkungan.</p>
                    <a href="#fitur" class="btn btn-light rounded-pill">Lihat Template <i class="bi bi-arrow-right-short"></i></a>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">

                    <img src="{{url('landing/imageh2.png')}}" alt="App Mockup" class="hero-img">
                </div>
            </div>
        </div>
    </header>

    <section id="fitur" class="py-5">
        <div class="container text-center">
            <h2 class="section-title">Kenapa Harus Pakai Aplikasi Kami?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <i class="bi bi-palette-fill feature-icon mb-3"></i>
                        <h4 class="fw-bold">Ratusan Template</h4>
                        <p class="text-muted">Pilih desain undangan pernikahan, ulang tahun, atau acara lainnya yang paling sesuai dengan seleramu.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <i class="bi bi-pencil-square feature-icon mb-3"></i>
                        <h4 class="fw-bold">Kustomisasi Mudah</h4>
                        <p class="text-muted">Ganti teks, foto, musik, dan detail acara dengan editor yang gampang banget digunain.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <i class="bi bi-send-check-fill feature-icon mb-3"></i>
                        <h4 class="fw-bold">Sebar Tanpa Batas</h4>
                        <p class="text-muted">Bagikan link undanganmu via WhatsApp, Instagram, atau media sosial lainnya ke seluruh tamu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contoh" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Intip Desain Populer Kami</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card">

                        <img src="{{url('landing/image.png')}}" class="card-img-top" alt="Contoh Desain 1">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">

                        <img src="{{url('landing/image1.png')}}" class="card-img-top" alt="Contoh Desain 2">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">

                        <img src="{{url('landing/image2.png')}}" class="card-img-top" alt="Contoh Desain 3">
                    </div>
                </div>
            </div>
             <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary rounded-pill">Lihat Semua Desain</a>
            </div>
        </div>
    </section>

    <section id="harga" class="py-5">
        <div class="container">
            <h2 class="section-title text-center">Pilih Paket yang Sesuai</h2>
            <div class="row justify-content-center g-4">
                <div class="col-md-5 col-lg-4">
                    <div class="card text-center p-4">
                        <div class="card-body">
                            <h5 class="card-title text-muted">Paket Hemat</h5>
                            <h2 class="card-title fw-bold my-3">Rp 69.000</h2>
                            <ul class="list-unstyled my-4">
                                <li><i class="bi bi-check-circle-fill text-success"></i> 1 Desain Undangan</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Batas Tamu 50 Orang</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Tanpa Galeri Foto</li>
                                <li><i class="bi bi-x-circle-fill text-danger"></i> Terdapat Iklan</li>
                            </ul>
                            <a href="{{route('login')}}" class="btn btn-outline-primary w-100">Pilih Paket</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="card text-center p-4 border-primary">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Paling Laris</span>
                            <h5 class="card-title text-primary">PREMIUM</h5>
                            <h2 class="card-title fw-bold my-3">Rp 99.000</h2>
                            <ul class="list-unstyled my-4">
                                <li><i class="bi bi-check-circle-fill text-success"></i> Semua Desain Terbuka</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Tanpa Batas Tamu</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Fitur Galeri Foto & Video</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Bebas Iklan</li>
                            </ul>
                            <a href="{{route('login')}}" class="btn btn-primary w-100">Pilih Paket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold">Siap Membuat Momen Spesialmu Lebih Berkesan?</h2>
            <p class="lead text-muted my-3">Jangan tunda lagi. Mulai buat undangan digital impianmu sekarang juga!</p>
            <a href="{{route('login')}}" class="btn btn-primary btn-lg rounded-pill mt-3">Buat Undangan Sekarang <i class="bi bi-arrow-right-short"></i></a>
        </div>
    </section>

    <footer class="footer py-4">
        <div class="container text-center">
            <p>&copy; 2025 NamaAplikasi. Dibuat dengan ❤️ untuk hari spesialmu.</p>
            <div>
                <a href="#" class="mx-2"><i class="bi bi-instagram fs-4"></i></a>
                <a href="#" class="mx-2"><i class="bi bi-facebook fs-4"></i></a>
                <a href="#" class="mx-2"><i class="bi bi-tiktok fs-4"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
