<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wedding of {{ $undangan->nama_pria }} & {{ $undangan->nama_wanita }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Montserrat:wght@300;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --primary-earth: #8D5A4E;
            /* Terracotta / Cokelat Merah */
            --secondary-beige: #F4EADF;
            /* Beige Cream */
            --accent-green: #6A7F66;
            /* Olive Green */
            --text-dark: #333;
            --font-script: 'Dancing Script', cursive;
            --font-body: 'Montserrat', sans-serif;
        }

        body {
            font-family: var(--font-body);
            color: var(--text-dark);
            background-color: var(--secondary-beige);
            overflow-x: hidden;
            line-height: 1.7;
            font-weight: 400;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: var(--font-script);
            font-weight: 700;
            color: var(--primary-earth);
        }

        .text-script {
            font-family: var(--font-script);
        }

        .text-accent-color {
            color: var(--accent-green);
        }

        .text-primary-color {
            color: var(--primary-earth);
        }

        /* --- Cover Overlay --- */
        #cover-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background-color: var(--secondary-beige);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            transition: transform 0.8s cubic-bezier(0.77, 0, 0.175, 1);
            padding: 20px;
        }

        #cover-overlay.open {
            transform: translateY(-100%);
        }

        .cover-title {
            font-size: 5rem;
            line-height: 1;
            margin-bottom: 20px;
        }

        .cover-subtitle {
            font-size: 1.2rem;
            font-weight: 500;
            color: var(--accent-green);
        }

        .btn-boho {
            background-color: var(--primary-earth);
            color: white;
            border: none;
            padding: 12px 35px;
            border-radius: 50px;
            /* Bentuk pil */
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-boho:hover {
            background-color: var(--accent-green);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        /* --- Hero Section --- */
        .hero-section {
            height: 100vh;
            position: relative;
            background-image: linear-gradient(rgba(244, 234, 223, 0.5), rgba(244, 234, 223, 0.8)), url('{{ $undangan->foto_hero ? Storage::url($undangan->foto_hero) : asset('images/placeholder-hero.png') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero-content {
            z-index: 1;
            /* Supaya di atas background overlay */
            color: var(--primary-earth);
        }

        .hero-date {
            font-size: 1.5rem;
            font-weight: 500;
            margin-top: 10px;
            color: var(--accent-green);
        }

        /* --- Section Padding --- */
        .section-pad {
            padding: 80px 0;
        }

        .bg-pattern {
            background-image: url('data:image/svg+xml;utf8,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="%23e0d8cf" fill-opacity="0.4"><path d="M12 0L0 12L12 24L24 12L12 0ZM36 0L24 12L36 24L48 12L36 0ZM60 0L48 12L60 24L72 12L60 0Z" /><path d="M0 36L12 48L24 36L12 24L0 36ZM24 36L36 48L48 36L36 24L24 36ZM48 36L60 48L72 36L60 24L48 36Z" /></g></svg>');
            background-size: 30px;
            /* Ukuran pattern kecil */
        }

        /* --- Quotes --- */
        .quote-bubble {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            border-left: 5px solid var(--accent-green);
        }

        /* --- Couple Photos --- */
        .couple-photo-circle {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid var(--primary-earth);
            padding: 5px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .couple-name {
            font-size: 2.5rem;
            margin-top: 20px;
            line-height: 1.2;
        }

        .and-text {
            font-family: var(--font-script);
            font-size: 3rem;
            color: var(--accent-green);
        }

        /* --- Countdown --- */
        .countdown-item {
            margin: 0 15px;
            text-align: center;
        }

        .countdown-num {
            font-family: var(--font-body);
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--primary-earth);
            line-height: 1.1;
        }

        .countdown-label {
            font-family: var(--font-body);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--accent-green);
        }

        /* --- Event Cards --- */
        .event-card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
            height: 100%;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .event-card h3 {
            color: var(--accent-green);
            font-size: 2rem;
        }

        .event-card p {
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* --- Gallery --- */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease-in-out;
        }

        .gallery-item:hover img {
            transform: scale(1.08);
        }

        /* --- Form RSVP & Gift --- */
        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 12px 15px;
            background-color: #fcfcfc;
            color: var(--text-dark);
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-control:focus {
            border-color: var(--accent-green);
            box-shadow: 0 0 0 0.25rem rgba(106, 127, 102, 0.25);
            /* Hijau transparan */
            background-color: #fff;
        }

        textarea.form-control {
            min-height: 120px;
        }

        /* --- Music Control --- */
        #music-control {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 999;
            background: var(--primary-earth);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: all 0.3s;
        }

        #music-control:hover {
            background-color: var(--accent-green);
        }

        .music-spin {
            animation: spin 4s linear infinite;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

        /* --- Utility --- */
        .w-80 {
            width: 80% !important;
            max-width: 500px;
        }

        .mx-auto {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        /* HILANGKAN TRANSISI ACCORDION (Permintaan Kamu) */
        .collapsing {
            transition: none !important;
        }

        /* Media queries for smaller screens */
        @media (max-width: 767.98px) {
            .cover-title {
                font-size: 3.5rem;
            }

            .section-pad {
                padding: 60px 0;
            }

            .couple-photo-circle {
                width: 200px;
                height: 200px;
            }

            .couple-name {
                font-size: 2rem;
            }

            .countdown-num {
                font-size: 2rem;
            }

            .countdown-item {
                margin: 0 8px;
            }

            .gallery-item img {
                height: 200px;
            }
        }
    </style>
</head>

<body>

    <audio id="bg-music" loop>
        <source src="{{ $undangan->music_url ?? asset('music/default.mp3') }}" type="audio/mpeg">
    </audio>
    <div id="music-control" onclick="toggleMusic()" style="display:none;">
        <i class="bi bi-music-note-beamed fs-4"></i>
    </div>

    <div id="cover-overlay">
        <div class="container" data-aos="fade-up">
            <h4 class="cover-subtitle">The Wedding Invitation of</h4>
            <h1 class="cover-title">{{ $undangan->nama_pria }} & {{ $undangan->nama_wanita }}</h1>

            <p class="text-uppercase small fw-bold mt-4" style="letter-spacing: 2px; color: #666;">Kepada Yth.</p>
            <h3 class="mt-2 text-primary-color">{{ $recipientName ?? 'Tamu Istimewa' }}</h3>

            <button class="btn-boho mt-5" id="btn-buka">
                Buka Undangan
            </button>
        </div>
    </div>

    <main id="main-content">

        <section class="hero-section">
            <div class="hero-content" data-aos="fade-up">
                <h2 class="display-3 text-script">{{ $undangan->nama_pria }} & {{ $undangan->nama_wanita }}</h2>
                <p class="hero-date">{{ optional($undangan->tanggal_resepsi)->format('d . M . Y') }}</p>
                <i class="bi bi-arrow-down-circle-fill fs-3 mt-4"
                    style="color: white; animation: bounce 2s infinite;"></i>
            </div>
            <style>
                @keyframes bounce {

                    0%,
                    20%,
                    50%,
                    80%,
                    100% {
                        transform: translateY(0);
                    }

                    40% {
                        transform: translateY(-10px);
                    }

                    60% {
                        transform: translateY(-5px);
                    }
                }
            </style>
        </section>

        <section class="section-pad bg-pattern">
            <div class="container text-center" style="max-width: 700px;" data-aos="fade-up">
                <h3 class="mb-4 text-accent-color">Bismillahi Rahmanir Rahim</h3>
                <div class="quote-bubble mx-auto">
                    <p class="lead fst-italic text-muted">
                        "Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan.
                        Ya Allah, perkenankanlah kami merajut cinta dalam Ridho-Mu,
                        menjadikan ibadah di setiap langkah kami. Semoga Engkau jadikan pernikahan ini
                        sebagai pintu rahmat bagi kami."
                    </p>
                </div>
                <p class="mt-4 small text-uppercase text-muted" style="letter-spacing: 1px;">— From Our Heart to Yours —
                </p>
            </div>
        </section>

        <section class="section-pad">
            <div class="container text-center">
                <h2 class="mb-5" data-aos="fade-up">Bride & Groom</h2>

                <div class="row align-items-center justify-content-center">
                    <div class="col-md-5 mb-5 mb-md-0" data-aos="fade-right">
                        <img src="{{ $undangan->foto_pria ? Storage::url($undangan->foto_pria) : 'https://via.placeholder.com/250' }}"
                            alt="Mempelai Pria" class="couple-photo-circle">
                        <h3 class="couple-name">{{ $undangan->nama_pria }}</h3>
                        <p class="text-muted small">Putra dari Bpk. {{ $undangan->ortu_pria }}</p>
                        <a href="#" class="small text-accent-color text-decoration-none"><i
                                class="bi bi-instagram me-1"></i>@instagram</a>
                    </div>

                    <div class="col-md-2 d-none d-md-block text-center" data-aos="zoom-in" data-aos-delay="200">
                        <span class="and-text">&</span>
                    </div>

                    <div class="col-md-5" data-aos="fade-left">
                        <img src="{{ $undangan->foto_wanita ? Storage::url($undangan->foto_wanita) : 'https://via.placeholder.com/250' }}"
                            alt="Mempelai Wanita" class="couple-photo-circle">
                        <h3 class="couple-name">{{ $undangan->nama_wanita }}</h3>
                        <p class="text-muted small">Putri dari Bpk. {{ $undangan->ortu_wanita }}</p>
                        <a href="#" class="small text-accent-color text-decoration-none"><i
                                class="bi bi-instagram me-1"></i>@instagram</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-pad bg-light">
            <div class="container text-center">
                <h2 class="mb-5" data-aos="fade-up">Save The Date</h2>

                <div class="d-flex justify-content-center mb-5" data-aos="zoom-in">
                    <div class="countdown-item"><span class="countdown-num" id="d">00</span><span
                            class="countdown-label">Hari</span></div>
                    <div class="countdown-item"><span class="countdown-num" id="h">00</span><span
                            class="countdown-label">Jam</span></div>
                    <div class="countdown-item"><span class="countdown-num" id="m">00</span><span
                            class="countdown-label">Menit</span></div>
                    <div class="countdown-item"><span class="countdown-num" id="s">00</span><span
                            class="countdown-label">Detik</span></div>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col-md-5" data-aos="fade-up">
                        <div class="event-card">
                            <h3 class="mb-3">Akad Nikah</h3>
                            <p class="fw-bold">{{ optional($undangan->tanggal_akad)->format('l, d F Y') }}</p>
                            <p class="text-muted">{{ $undangan->waktu_akad }} WIB</p>
                            <hr class="w-25 mx-auto text-muted">
                            <p class="small">{{ $undangan->alamat_akad }}</p>
                            @if ($undangan->gmaps_akad)
                                <a href="{{ $undangan->gmaps_akad }}" target="_blank"
                                    class="btn-boho btn-sm mt-3">Lihat Peta</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="event-card">
                            <h3 class="mb-3">Resepsi</h3>
                            <p class="fw-bold">{{ optional($undangan->tanggal_resepsi)->format('l, d F Y') }}</p>
                            <p class="text-muted">{{ $undangan->waktu_resepsi }} WIB</p>
                            <hr class="w-25 mx-auto text-muted">
                            <p class="small">{{ $undangan->alamat_resepsi }}</p>
                            @if ($undangan->gmaps_resepsi)
                                <a href="{{ $undangan->gmaps_resepsi }}" target="_blank"
                                    class="btn-boho btn-sm mt-3">Lihat Peta</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-pad">
            <div class="container text-center">
                <h2 class="mb-5" data-aos="fade-up">Our Precious Moments</h2>
                <div class="row g-3">
                    @php
                        $imgs = [];
                        if (!empty($galeri)) {
                            foreach (range(1, 6) as $i) {
                                $k = 'image' . $i;
                                if (!empty($galeri->{$k})) {
                                    $imgs[] = Storage::url($galeri->{$k});
                                }
                            }
                        }
                        // Default placeholders if no images
                        if (count($imgs) == 0) {
                            $imgs = [
                                'https://via.placeholder.com/600x400/DCCDC9/707070?text=Moment+1',
                                'https://via.placeholder.com/400x600/DCCDC9/707070?text=Moment+2',
                                'https://via.placeholder.com/600x400/DCCDC9/707070?text=Moment+3',
                                'https://via.placeholder.com/400x600/DCCDC9/707070?text=Moment+4',
                                'https://via.placeholder.com/600x400/DCCDC9/707070?text=Moment+5',
                                'https://via.placeholder.com/400x600/DCCDC9/707070?text=Moment+6',
                            ];
                        }
                    @endphp

                    @foreach ($imgs as $idx => $src)
                        <div class="col-lg-4 col-md-6 col-12" data-aos="fade-in"
                            data-aos-delay="{{ $idx * 100 }}">
                            <div class="gallery-item">
                                <img src="{{ $src }}" alt="Gallery Image {{ $idx + 1 }}"
                                    class="img-fluid">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-pad bg-light">
            <div class="container" style="max-width: 800px;">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="mb-3">Wedding Guestbook & Gifts</h2>
                    <p class="text-muted">Doa restu dari Anda adalah kado terindah bagi kami.</p>
                </div>

                <div class="row g-5">
                    <div class="col-md-6">
                        <h4 class="mb-4 text-center text-accent-color">Konfirmasi Kehadiran & Pesan</h4>
                        <form action="{{ route('undangan.ucapan') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $undangan->id }}">

                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Nama Lengkap Anda"
                                    name="nama" required>
                            </div>
                            <div class="mb-3">
                                <select class="form-control" name="kehadiran">
                                    <option value="Hadir">Saya akan Hadir</option>
                                    <option value="Tidak Hadir">Mohon Maaf, Berhalangan Hadir</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Tuliskan ucapan dan doa terbaik Anda..." name="ucapan"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn-boho w-100 mt-3">Kirim Pesan</button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <h4 class="mb-4 text-center text-accent-color">Kirim Tanda Kasih Digital</h4>
                        <div class="accordion" id="giftAccordion">
                            <div class="accordion-item shadow-sm mb-3" style="border-radius: 10px;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-white text-dark shadow-none"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#giftBank">
                                        <i class="bi bi-bank me-2 text-primary-color"></i> Transfer Bank
                                    </button>
                                </h2>
                                <div id="giftBank" class="accordion-collapse collapse"
                                    data-bs-parent="#giftAccordion">
                                    <div class="accordion-body">
                                        <p class="mb-1 fw-bold">{{ $undangan->nama_bank ?? 'Bank ABC' }}</p>
                                        <p class="mb-2 font-monospace fs-5 text-primary-color" id="rek-text">
                                            {{ $undangan->no_rekening ?? '0000-0000-0000' }}</p>
                                        <p class="small text-muted mb-3">a.n
                                            {{ $undangan->nama_pemilik ?? 'Nama Pemilik Rekening' }}</p>
                                        <button class="btn btn-boho btn-sm w-100" onclick="copyRek()">Salin No.
                                            Rekening</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="text-center py-5 bg-primary-color text-secondary-beige">
            <h2 class="text-secondary-beige mb-3">{{ $undangan->nama_pria }} & {{ $undangan->nama_wanita }}</h2>
            <p class="small text-secondary-beige" style="opacity: 0.8;">Thank you for being part of our special day.
            </p>
            <p class="small mt-3" style="opacity: 0.7;">&copy; {{ now()->year }} Undangan Digital.</p>
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        // Init AOS (Animasi Scroll)
        AOS.init({
            duration: 1000,
            once: true
        });

        // Musik Logic
        const music = document.getElementById('bg-music');
        const musicCtrl = document.getElementById('music-control');
        const musicIcon = musicCtrl.querySelector('i');
        let isPlaying = false;

        function toggleMusic() {
            if (isPlaying) {
                music.pause();
                musicIcon.classList.remove('music-spin');
                musicCtrl.style.backgroundColor = 'var(--primary-earth)'; // Kembali ke warna default
            } else {
                music.play();
                musicIcon.classList.add('music-spin');
                musicCtrl.style.backgroundColor = 'var(--accent-green)'; // Berubah warna saat play
            }
            isPlaying = !isPlaying;
        }

        // Buka Undangan
        document.getElementById('btn-buka').addEventListener('click', function() {
            document.getElementById('cover-overlay').classList.add('open');
            musicCtrl.style.display = 'flex'; // Munculkan tombol musik
            toggleMusic(); // Nyalakan musik otomatis
            // Optional: Sembunyikan overlay sepenuhnya setelah animasi selesai
            setTimeout(() => {
                document.getElementById('cover-overlay').style.display = 'none';
            }, 800);
        });

        // Copy Rekening
        function copyRek() {
            const text = document.getElementById('rek-text').innerText;
            navigator.clipboard.writeText(text);
            alert('Nomor rekening disalin!');
        }

        // Countdown Logic (Aman & Akurat)
        (function() {
            @php
                $tgl = \Carbon\Carbon::parse($undangan->tanggal_resepsi)->format('Y-m-d') ?? now()->addDays(7)->format('Y-m-d');
                $waktu = $undangan->waktu_resepsi ?? '08:00:00';
                if (strlen($waktu) == 5) {
                    $waktu .= ':00';
                }
            @endphp

            const targetDate = new Date("{{ $tgl }}T{{ $waktu }}").getTime();

            function pad(n) {
                return (n < 10 ? '0' : '') + n;
            }

            const timer = setInterval(() => {
                const now = new Date().getTime();
                const diff = targetDate - now;

                if (diff < 0) {
                    document.getElementById("d").innerText = "00";
                    document.getElementById("h").innerText = "00";
                    document.getElementById("m").innerText = "00";
                    document.getElementById("s").innerText = "00";
                    clearInterval(timer); // Stop countdown
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
