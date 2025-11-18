<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wedding of {{ $undangan->nama_pria ?? 'NAMA PRIA' }} & {{ $undangan->nama_wanita ?? 'NAMA WANITA' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --primary-color: #8B4513;
            --secondary-color: #F5DEB3;
            --font-display: 'Great Vibes', cursive;
            --font-body: 'Montserrat', sans-serif;
        }

        body {
            font-family: var(--font-body);
            background-color: #fcfaf8;
            overflow-x: hidden;
        }

        .cover-section {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-image: url('{{ $undangan->foto_hero ? Storage::url($undangan->foto_hero) : asset("images/placeholder-hero.png") }}');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            z-index: 1050;
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .cover-section.hidden {
            opacity: 0;
            transform: scale(1.2);
            pointer-events: none;
        }

        .cover-overlay {
            background-color: rgba(0, 0, 0, 0.45);
            position: absolute;
            inset: 0;
        }

        .cover-content {
            position: relative;
            z-index: 1;
        }

        .cover-content h1 {
            font-family: var(--font-display);
            font-size: 4rem;
        }

        #main-content {
            display: none;
        }

        .display-font {
            font-family: var(--font-display);
            color: var(--primary-color);
            font-size: 3.5rem;
        }

        .card-mempelai {
            border: none;
            background: transparent;
        }

        .card-mempelai img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid var(--secondary-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        #countdown {
            border: 2px solid var(--primary-color);
            padding: 20px;
            border-radius: 15px;
        }

        #countdown div {
            font-size: 2.5rem;
            font-weight: 600;
        }

        #countdown span {
            font-size: 1rem;
        }

        #audio-player {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        #audio-player button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        .bg-light-cream {
            background-color: #FAF6F0;
        }

        .section {
            padding: 80px 0;
        }
    </style>
</head>
<body>
    <div id="audio-player">
        <audio id="background-music" loop>
            <source src="{{ $undangan->music_url ?? asset('path/to/music.mp3') }}" type="audio/mpeg">
            Browser Anda tidak mendukung elemen audio.
        </audio>
        <button id="play-pause-btn">
            <i class="bi bi-music-note"></i>
        </button>
    </div>

    <div class="cover-section" id="cover">
        <div class="cover-overlay"></div>
        <div class="cover-content p-3">
            <p class="mb-2">The Wedding Of</p>
            <h1 class="mb-4">{{ $undangan->nama_pria ?? 'Nama Pria' }} &amp; {{ $undangan->nama_wanita ?? 'Nama Wanita' }}</h1>
            <p>Kepada Yth. Bapak/Ibu/Saudara/i</p>
            <h4 class="fw-bold">{{ $recipientName ?? 'Nama Tamu' }}</h4>
            <p class="mt-4">Tanpa mengurangi rasa hormat, kami mengundang Anda untuk hadir di acara pernikahan kami.</p>
            <button class="btn btn-light btn-lg rounded-pill mt-3" id="open-invitation-btn">
                <i class="bi bi-envelope-open-fill me-2"></i> Buka Undangan
            </button>
        </div>
    </div>

    <div id="main-content">
        <section class="section text-center">
            <div class="container" data-aos="fade-up">
                <p class="fst-italic lead">"Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri..."</p>
                <p class="fw-bold">(QS. Ar-Rum: 21)</p>
            </div>
        </section>

        <section id="mempelai" class="section bg-light-cream">
            <div class="container text-center">
                <h2 class="display-font" data-aos="fade-up">Pasangan Mempelai</h2>
                <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">
                    Dengan rahmat Tuhan, kami menyatukan dua hati dalam ikatan suci pernikahan.
                </p>
                <div class="row justify-content-center align-items-center g-5">
                    <div class="col-md-5" data-aos="fade-right">
                        <div class="card-mempelai text-center">
                            <img src="{{ $undangan->foto_pria ? Storage::url($undangan->foto_pria) : 'https://via.placeholder.com/180' }}" 
                                 alt="Mempelai Pria" 
                                 class="mx-auto mb-3">
                            <h3 class="display-font my-3">{{ $undangan->nama_pria }}</h3>
                            <p>{{ $undangan->ortu_pria }}</p>
                        </div>
                    </div>

                    <div class="col-md-2" data-aos="zoom-in">
                        <h1 class="display-font">&</h1>
                    </div>

                    <div class="col-md-5" data-aos="fade-left">
                        <div class="card-mempelai text-center">
                            <img src="{{ $undangan->foto_wanita ? Storage::url($undangan->foto_wanita) : 'https://via.placeholder.com/180' }}" 
                                 alt="Mempelai Wanita" 
                                 class="mx-auto mb-3">
                            <h3 class="display-font my-3">{{ $undangan->nama_wanita }}</h3>
                            <p>{{ $undangan->ortu_wanita }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="acara" class="section">
            <div class="container text-center">
                <h2 class="display-font" data-aos="fade-up">Detail Acara</h2>
                <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">
                    Merupakan suatu kehormatan bagi kami apabila Anda berkenan hadir.
                </p>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-5" data-aos="fade-up">
                        <div class="card h-100 shadow-sm p-4">
                            <div class="card-body">
                                <h3>Akad Nikah</h3>
                                <p>
                                    <i class="bi bi-calendar-heart me-2"></i>
                                    {{ optional($undangan->tanggal_akad)->format('l, d M Y') ?? $undangan->tanggal_akad }}
                                </p>
                                <p>
                                    <i class="bi bi-clock me-2"></i>
                                    {{ $undangan->waktu_akad }}
                                </p>
                                <p>
                                    <i class="bi bi-geo-alt me-2"></i>
                                    {!! nl2br(e($undangan->alamat_akad)) !!}
                                </p>
                                @if($undangan->gmaps_akad)
                                    <a href="{{ $undangan->gmaps_akad }}" 
                                       target="_blank" 
                                       class="btn btn-outline-dark btn-sm">
                                        Lihat Peta
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 shadow-sm p-4">
                            <div class="card-body">
                                <h3>Resepsi</h3>
                                <p>
                                    <i class="bi bi-calendar-check me-2"></i>
                                    {{ optional($undangan->tanggal_resepsi)->format('l, d M Y') ?? $undangan->tanggal_resepsi }}
                                </p>
                                <p>
                                    <i class="bi bi-clock me-2"></i>
                                    {{ $undangan->waktu_resepsi }}
                                </p>
                                <p>
                                    <i class="bi bi-geo-alt me-2"></i>
                                    {!! nl2br(e($undangan->alamat_resepsi)) !!}
                                </p>
                                @if($undangan->gmaps_resepsi)
                                    <a href="{{ $undangan->gmaps_resepsi }}" 
                                       target="_blank" 
                                       class="btn btn-outline-dark btn-sm">
                                        Lihat Peta
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5" data-aos="fade-up">
                    <h3 class="fw-light">Menghitung Hari</h3>
                    <div id="countdown" class="d-flex justify-content-around mt-3 mx-auto" style="max-width: 500px;">
                        <div>
                            <div id="countdown-days">00</div>
                            <span>Hari</span>
                        </div>
                        <div>
                            <div id="countdown-hours">00</div>
                            <span>Jam</span>
                        </div>
                        <div>
                            <div id="countdown-minutes">00</div>
                            <span>Menit</span>
                        </div>
                        <div>
                            <div id="countdown-seconds">00</div>
                            <span>Detik</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="galeri" class="section bg-light-cream">
            <div class="container text-center">
                <h2 class="display-font" data-aos="fade-up">Momen Bahagia Kami</h2>
                <div class="row g-3 mt-4">
                    @php
                        $galleryImages = [];
                        if (!empty($galeri)) {
                            foreach (range(1, 6) as $imageIndex) {
                                $imageKey = 'image' . $imageIndex;
                                if (!empty($galeri->{$imageKey})) {
                                    $galleryImages[] = Storage::url($galeri->{$imageKey});
                                }
                            }
                        }
                        
                        while (count($galleryImages) < 6) {
                            $galleryImages[] = 'https://via.placeholder.com/400x400.png?text=Foto';
                        }
                    @endphp

                    @foreach($galleryImages as $index => $imageSource)
                        <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                            <img src="{{ $imageSource }}" 
                                 class="img-fluid rounded shadow" 
                                 alt="Foto Galeri {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="hadiah" class="section">
            <div class="container text-center" style="max-width: 700px;">
                <h2 class="display-font" data-aos="fade-up">Kirim Hadiah</h2>
                <p class="text-muted mb-4" data-aos="fade-up" data-aos-delay="100">
                    Doa restu Anda merupakan karunia yang sangat berarti bagi kami. 
                    Namun jika memberi adalah ungkapan tanda kasih, Anda dapat memberi kado secara digital.
                </p>

                <div class="accordion" id="gift-accordion" data-aos="fade-up" data-aos-delay="200">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#bank-transfer-section" 
                                    aria-expanded="false" 
                                    aria-controls="bank-transfer-section">
                                <i class="bi bi-bank me-2"></i> Transfer Bank
                            </button>
                        </h2>
                        <div id="bank-transfer-section" 
                             class="accordion-collapse collapse" 
                             data-bs-parent="#gift-accordion">
                            <div class="accordion-body text-start">
                                <p>
                                    <strong>{{ $undangan->nama_bank ?? 'Bank' }}: {{ $undangan->no_rekening ?? '1234567890' }}</strong> 
                                    a.n {{ $undangan->nama_pemilik ?? 'Nama Pemilik' }}
                                </p>
                                <button class="btn btn-sm btn-outline-dark" 
                                        onclick="copyAccountNumber('{{ $undangan->no_rekening ?? '' }}')">
                                    Salin No. Rekening
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#ewallet-section" 
                                    aria-expanded="false" 
                                    aria-controls="ewallet-section">
                                <i class="bi bi-wallet2 me-2"></i> E-Wallet
                            </button>
                        </h2>
                        <div id="ewallet-section" 
                             class="accordion-collapse collapse" 
                             data-bs-parent="#gift-accordion">
                            <div class="accordion-body">
                                <img src="{{ asset('images/qr-placeholder.png') }}" 
                                     alt="QR Code" 
                                     class="img-fluid">
                                <p class="mt-2">Scan QR Code (Gopay/OVO/Dana)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="ucapan" class="section bg-light-cream">
            <div class="container" style="max-width: 700px;">
                <h2 class="display-font text-center" data-aos="fade-up">Buku Tamu</h2>
                <p class="text-muted text-center mb-4" data-aos="fade-up" data-aos-delay="100">
                    Berikan ucapan dan doa restu Anda kepada kami.
                </p>

                <form action="" method="POST" data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="mb-3">
                        <label for="guest-name" class="form-label">Nama Anda</label>
                        <input type="text" 
                               class="form-control" 
                               id="guest-name" 
                               name="name" 
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="attendance-confirmation" class="form-label">Konfirmasi Kehadiran</label>
                        <select class="form-select" 
                                id="attendance-confirmation" 
                                name="presence">
                            <option value="">Pilih salah satu</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="guest-message" class="form-label">Ucapan & Doa</label>
                        <textarea class="form-control" 
                                  id="guest-message" 
                                  name="message" 
                                  rows="4" 
                                  required></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark">Kirim Ucapan</button>
                </form>
            </div>
        </section>

        <footer class="text-center py-5">
            <p class="text-muted">
                Merupakan suatu kebahagiaan bagi kami atas kehadiran dan doa restu dari Bapak/Ibu/Saudara/i.
            </p>
            <h2 class="display-font mt-4">{{ $undangan->nama_pria }} &amp; {{ $undangan->nama_wanita }}</h2>
            <p class="mt-4 small">&copy; {{ now()->year }} Dibuat dengan cinta.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        const coverSection = document.getElementById('cover');
        const mainContent = document.getElementById('main-content');
        const openInvitationBtn = document.getElementById('open-invitation-btn');
        const backgroundMusic = document.getElementById('background-music');
        const playPauseBtn = document.getElementById('play-pause-btn');

        openInvitationBtn.addEventListener('click', () => {
            coverSection.classList.add('hidden');
            mainContent.style.display = 'block';
            backgroundMusic.play();
            playPauseBtn.innerHTML = '<i class="bi bi-pause-fill"></i>';

            AOS.init({ duration: 1000, once: true });

            setTimeout(() => {
                coverSection.style.display = 'none';
            }, 1000);
        });

        playPauseBtn.addEventListener('click', () => {
            if (backgroundMusic.paused) {
                backgroundMusic.play();
                playPauseBtn.innerHTML = '<i class="bi bi-pause-fill"></i>';
            } else {
                backgroundMusic.pause();
                playPauseBtn.innerHTML = '<i class="bi bi-music-note"></i>';
            }
        });

        function copyAccountNumber(accountNumber) {
            navigator.clipboard.writeText(accountNumber).then(
                function() {
                    alert('No. Rekening berhasil disalin!');
                },
                function(error) {
                    alert('Gagal menyalin No. Rekening.');
                }
            );
        }

        (function initCountdown() {
            @php
                $weddingDate = \Carbon\Carbon::parse($undangan->tanggal_resepsi)->format('Y-m-d');
                $weddingTime = $undangan->waktu_resepsi ?? '08:00:00';
                
                if (strlen($weddingTime) == 5) {
                    $weddingTime .= ':00';
                }
            @endphp

            const targetDateString = "{{ $weddingDate }}T{{ $weddingTime }}";
            const targetTimestamp = new Date(targetDateString).getTime();

            function padNumber(number) {
                return (number < 10 ? '0' : '') + number;
            }

            const countdownInterval = setInterval(updateCountdown, 1000);
            function updateCountdown() {
                const currentTime = new Date().getTime();
                const timeRemaining = targetTimestamp - currentTime;

                if (timeRemaining < 0) {
                    document.getElementById("countdown-days").innerText = "00";
                    document.getElementById("countdown-hours").innerText = "00";
                    document.getElementById("countdown-minutes").innerText = "00";
                    document.getElementById("countdown-seconds").innerText = "00";
                    clearInterval(countdownInterval);
                    return;
                }

                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                document.getElementById("countdown-days").innerText = padNumber(days);
                document.getElementById("countdown-hours").innerText = padNumber(hours);
                document.getElementById("countdown-minutes").innerText = padNumber(minutes);
                document.getElementById("countdown-seconds").innerText = padNumber(seconds);
            }

            updateCountdown(); 
        })();
    </script>
</body>
</html>
