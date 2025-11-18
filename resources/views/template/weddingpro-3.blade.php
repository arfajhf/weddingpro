<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wedding of {{ $undangan->nama_pria }} & {{ $undangan->nama_wanita }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --bg-color: #ffffff;
            --text-color: #2c2c2c;
            --accent-color: #7f8c8d; /* Abu-abu elegan */
            --font-title: 'DM Serif Display', serif;
            --font-body: 'Inter', sans-serif;
        }

        body {
            font-family: var(--font-body);
            color: var(--text-color);
            background-color: var(--bg-color);
            overflow-x: hidden;
            letter-spacing: -0.5px;
        }

        /* --- Tipografi --- */
        h1, h2, h3, h4 { font-family: var(--font-title); font-weight: 400; letter-spacing: normal; }
        .text-muted { color: #888 !important; font-weight: 300; }

        /* --- Cover Overlay --- */
        #cover-overlay {
            position: fixed; inset: 0; z-index: 9999;
            background-color: #fff;
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            text-align: center;
            transition: transform 0.8s cubic-bezier(0.77, 0, 0.175, 1);
        }
        #cover-overlay.open { transform: translateY(-100%); }

        /* --- Hero Image --- */
        .hero-section {
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .hero-bg {
            position: absolute; inset: 0;
            background-image: url('{{ $undangan->foto_hero ? Storage::url($undangan->foto_hero) : asset("images/placeholder-hero.png") }}');
            background-size: cover; background-position: center;
            filter: brightness(0.7);
            transform: scale(1.1); /* Efek zoom dikit */
        }
        .hero-content {
            position: relative; z-index: 2;
            height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;
            text-align: center; color: white;
        }
        .hero-title { font-size: 4rem; margin-bottom: 0; line-height: 1; }

        /* --- Couple Section --- */
        .couple-photo {
            width: 100%; aspect-ratio: 3/4; object-fit: cover;
            filter: grayscale(20%); /* Efek estetik */
            transition: filter 0.5s;
        }
        .couple-photo:hover { filter: grayscale(0%); }

        /* --- Event Cards (Minimalist) --- */
        .event-card {
            border: 1px solid #eee;
            padding: 40px;
            text-align: center;
            background: #fff;
            height: 100%;
            transition: transform 0.3s;
        }
        .event-card:hover { border-color: #333; }

        /* --- Countdown --- */
        .countdown-item { display: inline-block; margin: 0 15px; text-align: center; }
        .countdown-num { font-family: var(--font-title); font-size: 2.5rem; display: block; line-height: 1; }
        .countdown-label { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; color: #999; }

        /* --- Tombol --- */
        .btn-minimal {
            background: #1a1a1a; color: #fff;
            padding: 15px 40px; border: none; border-radius: 0;
            text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px;
            transition: all 0.3s;
        }
        .btn-minimal:hover { background: #333; color: #fff; transform: translateY(-2px); }

        .btn-outline-minimal {
            background: transparent; color: #1a1a1a;
            border: 1px solid #1a1a1a;
            padding: 10px 25px; border-radius: 0;
            font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px;
        }
        .btn-outline-minimal:hover { background: #1a1a1a; color: white; }

        /* --- Music Control (Vinyl Style) --- */
        #music-control {
            position: fixed; bottom: 30px; left: 30px; z-index: 999;
            background: white; width: 50px; height: 50px;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); cursor: pointer;
            border: 1px solid #eee;
        }
        .music-spin { animation: spin 4s linear infinite; }
        @keyframes spin { 100% { transform: rotate(360deg); } }

        /* --- HILANGKAN TRANSISI ACCORDION (Permintaan Kamu) --- */
        .collapsing { transition: none !important; }

        /* Form Style */
        .form-control { border-radius: 0; border: 1px solid #ddd; padding: 15px; background: #f9f9f9; }
        .form-control:focus { background: #fff; border-color: #333; box-shadow: none; }

        /* Helper */
        .section-pad { padding: 100px 0; }
    </style>
</head>
<body>

    <audio id="bg-music" loop>
        <source src="{{ $undangan->music_url ?? asset('music/default.mp3') }}" type="audio/mpeg">
    </audio>
    <div id="music-control" onclick="toggleMusic()" style="display:none;">
        <i class="bi bi-disc fs-4"></i>
    </div>

    <div id="cover-overlay">
        <div class="container">
            <p class="text-uppercase letter-spacing-2 text-muted mb-3">The Wedding of</p>
            <h1 class="display-1 mb-4">{{ $undangan->nama_pria }} <span class="fs-4 fst-italic text-muted">&</span> {{ $undangan->nama_wanita }}</h1>

            <div class="py-4">
                <p class="mb-0 small text-muted">Kepada Yth.</p>
                <h4 class="mt-2">{{ $recipientName ?? 'Tamu Spesial' }}</h4>
            </div>

            <button class="btn-minimal mt-4" id="btn-buka">
                Buka Undangan
            </button>
        </div>
    </div>

    <main id="main-content">

        <section class="hero-section">
            <div class="hero-bg"></div>
            <div class="hero-content container">
                <p class="text-uppercase mb-2" data-aos="fade-up">Save The Date</p>
                <h2 class="hero-title" data-aos="fade-up" data-aos-delay="100">{{ $undangan->nama_pria }} & {{ $undangan->nama_wanita }}</h2>
                <p class="mt-3 fs-5" data-aos="fade-up" data-aos-delay="200">
                    {{ optional($undangan->tanggal_resepsi)->format('d . m . Y') }}
                </p>
            </div>
        </section>

        <section class="section-pad text-center">
            <div class="container" style="max-width: 700px;" data-aos="fade-up">
                <h3 class="mb-4">Foreword</h3>
                <p class="lead text-muted fst-italic">
                    "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya."
                </p>
                <p class="small text-uppercase mt-3 ls-2">— QS. Ar-Rum: 21 —</p>
            </div>
        </section>

        <section class="container section-pad pt-0">
            <div class="row g-0 align-items-center">
                <div class="col-md-6 order-md-1 order-2" data-aos="fade-right">
                    <img src="{{ $undangan->foto_pria ? Storage::url($undangan->foto_pria) : 'https://via.placeholder.com/600x800' }}" class="couple-photo">
                </div>
                <div class="col-md-6 order-md-2 order-1 p-5 text-center text-md-start" data-aos="fade-left">
                    <h2 class="display-5">{{ $undangan->nama_pria }}</h2>
                    <p class="text-muted mt-3">Putra ke-2 dari pasangan<br>Bpk. {{ $undangan->ortu_pria }}</p>
                    <a href="#" class="btn-outline-minimal mt-3">@instagram</a>
                </div>

                <div class="col-md-6 order-md-3 order-3 p-5 text-center text-md-end" data-aos="fade-right">
                    <h2 class="display-5">{{ $undangan->nama_wanita }}</h2>
                    <p class="text-muted mt-3">Putri ke-3 dari pasangan<br>Bpk. {{ $undangan->ortu_wanita }}</p>
                    <a href="#" class="btn-outline-minimal mt-3">@instagram</a>
                </div>
                <div class="col-md-6 order-md-4 order-4" data-aos="fade-left">
                    <img src="{{ $undangan->foto_wanita ? Storage::url($undangan->foto_wanita) : 'https://via.placeholder.com/600x800' }}" class="couple-photo">
                </div>
            </div>
        </section>

        <section class="section-pad bg-light">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2>The Wedding Event</h2>
                    <p class="text-muted">Kami menantikan kehadiran Anda di hari bahagia kami.</p>
                </div>

                <div class="text-center mb-5" data-aos="zoom-in">
                    <div class="countdown-item"><span class="countdown-num" id="d">00</span><span class="countdown-label">Days</span></div>
                    <div class="countdown-item"><span class="countdown-num" id="h">00</span><span class="countdown-label">Hours</span></div>
                    <div class="countdown-item"><span class="countdown-num" id="m">00</span><span class="countdown-label">Mins</span></div>
                    <div class="countdown-item"><span class="countdown-num" id="s">00</span><span class="countdown-label">Secs</span></div>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col-md-5" data-aos="fade-up">
                        <div class="event-card">
                            <h3 class="mb-4">Akad Nikah</h3>
                            <p class="mb-1 fw-bold">{{ optional($undangan->tanggal_akad)->format('l, d F Y') }}</p>
                            <p class="text-muted mb-4">{{ $undangan->waktu_akad }} WIB</p>
                            <hr class="mx-auto" style="width: 50px;">
                            <p class="small text-muted mt-4">{{ $undangan->alamat_akad }}</p>
                            @if($undangan->gmaps_akad)
                                <a href="{{ $undangan->gmaps_akad }}" target="_blank" class="btn-outline-minimal mt-2">Google Maps</a>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="event-card">
                            <h3 class="mb-4">Resepsi</h3>
                            <p class="mb-1 fw-bold">{{ optional($undangan->tanggal_resepsi)->format('l, d F Y') }}</p>
                            <p class="text-muted mb-4">{{ $undangan->waktu_resepsi }} WIB</p>
                            <hr class="mx-auto" style="width: 50px;">
                            <p class="small text-muted mt-4">{{ $undangan->alamat_resepsi }}</p>
                            @if($undangan->gmaps_resepsi)
                                <a href="{{ $undangan->gmaps_resepsi }}" target="_blank" class="btn-outline-minimal mt-2">Google Maps</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-pad text-center">
            <div class="container">
                <h2 class="mb-5" data-aos="fade-up">Our Gallery</h2>
                <div class="row g-3">
                    @php
                        $imgs = [];
                        if (!empty($galeri)) {
                            foreach (range(1,6) as $i) {
                                $k = 'image'.$i;
                                if (!empty($galeri->{$k})) $imgs[] = Storage::url($galeri->{$k});
                            }
                        }
                        if (count($imgs) == 0) {
                            $imgs = ['https://via.placeholder.com/400', 'https://via.placeholder.com/400', 'https://via.placeholder.com/400'];
                        }
                    @endphp

                    @foreach($imgs as $idx => $src)
                        <div class="col-md-4 col-6" data-aos="fade-in" data-aos-delay="{{ $idx * 100 }}">
                            <img src="{{ $src }}" class="img-fluid w-100" style="height: 300px; object-fit: cover; filter: grayscale(10%);">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-pad bg-light">
            <div class="container" style="max-width: 800px;">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2>Wedding Gift & RSVP</h2>
                    <p class="text-muted">Doa restu Anda adalah hadiah terbaik bagi kami.</p>
                </div>

                <div class="row g-5">
                    <div class="col-md-6">
                        <h4 class="mb-4 text-center">Digital Gift</h4>
                        <div class="accordion" id="giftAccordion">
                            <div class="accordion-item border-0 mb-3 shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-white text-dark shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#gift1">
                                        <i class="bi bi-credit-card me-2"></i> Transfer Bank
                                    </button>
                                </h2>
                                <div id="gift1" class="accordion-collapse collapse" data-bs-parent="#giftAccordion">
                                    <div class="accordion-body">
                                        <p class="mb-1 fw-bold">{{ $undangan->nama_bank }}</p>
                                        <p class="mb-2 font-monospace fs-5" id="rek">{{ $undangan->no_rekening ?? '00000000' }}</p>
                                        <p class="small text-muted mb-3">a.n {{ $undangan->nama_pemilik }}</p>
                                        <button class="btn btn-sm btn-dark w-100" onclick="copyRek()">Salin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4 class="mb-4 text-center">Buku Tamu</h4>
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" required>
                            </div>
                            <div class="mb-3">
                                <select class="form-control" name="presence">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Tidak Hadir">Berhalangan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="3" placeholder="Pesan & Doa" name="message" required></textarea>
                            </div>
                            <button type="submit" class="btn-minimal w-100">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-5 text-center">
            <h2 class="fs-4 mb-3">{{ $undangan->nama_pria }} & {{ $undangan->nama_wanita }}</h2>
            <p class="small text-muted">&copy; {{ now()->year }} Wedding Invitation.</p>
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        // Init AOS (Animasi Scroll)
        AOS.init({ duration: 1000, once: true });

        // Musik Logic
        const music = document.getElementById('bg-music');
        const musicCtrl = document.getElementById('music-control');
        const musicIcon = musicCtrl.querySelector('i');
        let isPlaying = false;

        function toggleMusic() {
            if (isPlaying) {
                music.pause();
                musicIcon.classList.remove('music-spin');
                musicCtrl.style.opacity = "0.7";
            } else {
                music.play();
                musicIcon.classList.add('music-spin');
                musicCtrl.style.opacity = "1";
            }
            isPlaying = !isPlaying;
        }

        // Buka Undangan
        document.getElementById('btn-buka').addEventListener('click', function() {
            document.getElementById('cover-overlay').classList.add('open');
            musicCtrl.style.display = 'flex'; // Munculkan tombol musik
            toggleMusic(); // Nyalakan musik otomatis
        });

        // Copy Rekening
        function copyRek() {
            const text = document.getElementById('rek').innerText;
            navigator.clipboard.writeText(text);
            alert('Nomor rekening disalin!');
        }

        // Countdown Logic (Aman & Akurat)
        (function () {
            @php
                $tgl = optional($undangan->tanggal_resepsi)->format('Y-m-d') ?? now()->addDays(7)->format('Y-m-d');
                $waktu = $undangan->waktu_resepsi ?? '08:00:00';
                if (strlen($waktu) == 5) $waktu .= ':00';
            @endphp

            const targetDate = new Date("{{ $tgl }}T{{ $waktu }}").getTime();

            function pad(n) { return (n < 10 ? '0' : '') + n; }

            const timer = setInterval(() => {
                const now = new Date().getTime();
                const diff = targetDate - now;

                if (diff < 0) {
                    // Waktu habis
                    document.getElementById("d").innerText = "00";
                    return;
                }

                const d = Math.floor(diff / (1000 * 60 * 60 * 24));
                const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const s = Math.floor((diff % (1000 * 60)) / 1000);

                document.getElementById("d").innerText = pad(d);
                document.getElementById("h").innerText = pad(h);
                document.getElementById("m").innerText = pad(m);
                document.getElementById("s").innerText = pad(s);
            }, 1000);
        })();
    </script>
</body>
</html>
