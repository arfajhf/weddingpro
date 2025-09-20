<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wedding of Rian & Aulia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --primary-color: #8B4513; /* Warna Coklat Kayu */
            --secondary-color: #F5DEB3; /* Warna Gandum/Krem */
            --font-display: 'Great Vibes', cursive;
            --font-body: 'Montserrat', sans-serif;
        }

        body {
            font-family: var(--font-body);
            background-color: #fcfaf8;
            overflow-x: hidden;
        }

        /* --- Cover Section --- */
        .cover-section {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-image: url('undangan/hero/hero1.jpg'); /* GANTI GAMBAR COVER DI SINI */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
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
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .cover-content {
            position: relative;
            z-index: 1;
        }
        .cover-content h1 {
            font-family: var(--font-display);
            font-size: 4rem;
        }

        /* --- Main Content --- */
        #main-content {
            display: none; /* Disembunyikan awal, muncul setelah buka undangan */
        }
        .section {
            padding: 80px 0;
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
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        /* --- Countdown --- */
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

        /* --- Audio Player --- */
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

        /* Helper class for section background */
        .bg-light-cream {
            background-color: #FAF6F0;
        }
    </style>
</head>
<body>

    <div id="audio-player">
        <audio id="background-music" loop>
            <source src="path/to/your/music.mp3" type="audio/mpeg">
            Browser Anda tidak mendukung elemen audio.
        </audio>
        <button id="play-pause-btn"><i class="bi bi-music-note"></i></button>
    </div>

    <div class="cover-section" id="cover">
        <div class="cover-overlay"></div>
        <div class="cover-content p-3">
            <p class="mb-2">The Wedding Of</p>
            <h1 class="mb-4">Rian & Aulia</h1>
            <p>Kepada Yth. Bapak/Ibu/Saudara/i</p>
            <h4 class="fw-bold">Nama Tamu</h4>
            <p class="mt-4">Tanpa mengurangi rasa hormat, kami mengundang Anda untuk hadir di acara pernikahan kami.</p>
            <button class="btn btn-light btn-lg rounded-pill mt-3" id="bukaUndangan">
                <i class="bi bi-envelope-open-fill me-2"></i> Buka Undangan
            </button>
        </div>
    </div>

    <div id="main-content">
        <section class="section text-center">
            <div class="container" data-aos="fade-up">
                <p class="fst-italic lead">"Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang."</p>
                <p class="fw-bold">(QS. Ar-Rum: 21)</p>
            </div>
        </section>

        <section id="mempelai" class="section bg-light-cream">
            <div class="container text-center">
                <h2 class="display-font" data-aos="fade-up">Pasangan Mempelai</h2>
                <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">Dengan rahmat Tuhan, kami menyatukan dua hati dalam ikatan suci pernikahan.</p>
                <div class="row justify-content-center align-items-center g-5">
                    <div class="col-md-5" data-aos="fade-right">
                        <div class="card-mempelai text-center">
                            <img src="https://via.placeholder.com/180x180.png?text=Foto+Pria" alt="Mempelai Pria" class="mx-auto mb-3">
                            <h3 class="display-font my-3">Rian Hidayat</h3>
                            <p>Putra dari Bapak Subarjo & Ibu Siti Aminah</p>
                        </div>
                    </div>
                    <div class="col-md-2" data-aos="zoom-in">
                        <h1 class="display-font">&</h1>
                    </div>
                    <div class="col-md-5" data-aos="fade-left">
                        <div class="card-mempelai text-center">
                            <img src="https://via.placeholder.com/180x180.png?text=Foto+Wanita" alt="Mempelai Wanita" class="mx-auto mb-3">
                            <h3 class="display-font my-3">Aulia Putri</h3>
                            <p>Putri dari Bapak Budi Santoso & Ibu Ratna Wulan</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="acara" class="section">
            <div class="container text-center">
                <h2 class="display-font" data-aos="fade-up">Detail Acara</h2>
                <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">Merupakan suatu kehormatan bagi kami apabila Anda berkenan hadir.</p>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-5" data-aos="fade-up">
                        <div class="card h-100 shadow-sm p-4">
                            <div class="card-body">
                                <h3>Akad Nikah</h3>
                                <p><i class="bi bi-calendar-heart me-2"></i>Jumat, 26 September 2025</p>
                                <p><i class="bi bi-clock me-2"></i>09:00 WIB - Selesai</p>
                                <p><i class="bi bi-geo-alt me-2"></i>Masjid Agung Banjarsari, Jawa Barat</p>
                                <a href="https://maps.app.goo.gl/yourlink" target="_blank" class="btn btn-outline-dark btn-sm">Lihat Peta</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 shadow-sm p-4">
                            <div class="card-body">
                                <h3>Resepsi</h3>
                                <p><i class="bi bi-calendar-check me-2"></i>Sabtu, 27 September 2025</p>
                                <p><i class="bi bi-clock me-2"></i>11:00 - 14:00 WIB</p>
                                <p><i class="bi bi-geo-alt me-2"></i>Gedung Serbaguna Amanda, Banjarsari</p>
                                <a href="https://maps.app.goo.gl/yourlink" target="_blank" class="btn btn-outline-dark btn-sm">Lihat Peta</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5" data-aos="fade-up">
                    <h3 class="fw-light">Menghitung Hari</h3>
                    <div id="countdown" class="d-flex justify-content-around mt-3 mx-auto" style="max-width: 500px;">
                        <div><div id="days">00</div><span>Hari</span></div>
                        <div><div id="hours">00</div><span>Jam</span></div>
                        <div><div id="minutes">00</div><span>Menit</span></div>
                        <div><div id="seconds">00</div><span>Detik</span></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="galeri" class="section bg-light-cream">
            <div class="container text-center">
                <h2 class="display-font" data-aos="fade-up">Momen Bahagia Kami</h2>
                <div class="row g-3 mt-4">
                    <div class="col-md-4 col-6" data-aos="fade-up"><img src="https://via.placeholder.com/400x400.png?text=Foto+1" class="img-fluid rounded shadow"></div>
                    <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="100"><img src="https://via.placeholder.com/400x400.png?text=Foto+2" class="img-fluid rounded shadow"></div>
                    <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="200"><img src="https://via.placeholder.com/400x400.png?text=Foto+3" class="img-fluid rounded shadow"></div>
                    <div class="col-md-4 col-6" data-aos="fade-up"><img src="https://via.placeholder.com/400x400.png?text=Foto+4" class="img-fluid rounded shadow"></div>
                    <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="100"><img src="https://via.placeholder.com/400x400.png?text=Foto+5" class="img-fluid rounded shadow"></div>
                    <div class="col-md-4 col-6" data-aos="fade-up" data-aos-delay="200"><img src="https://via.placeholder.com/400x400.png?text=Foto+6" class="img-fluid rounded shadow"></div>
                </div>
            </div>
        </section>

        <section id="hadiah" class="section">
            <div class="container text-center" style="max-width: 700px;">
                <h2 class="display-font" data-aos="fade-up">Kirim Hadiah</h2>
                <p class="text-muted mb-4" data-aos="fade-up" data-aos-delay="100">Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika memberi adalah ungkapan tanda kasih, Anda dapat memberi kado secara digital.</p>
                <div class="accordion" id="accordionHadiah" data-aos="fade-up" data-aos-delay="200">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <i class="bi bi-bank me-2"></i> Transfer Bank
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionHadiah">
                            <div class="accordion-body text-start">
                                <p><strong>BCA: 1234567890</strong> a.n Rian Hidayat</p>
                                <button class="btn btn-sm btn-outline-dark" onclick="copyToClipboard('1234567890')">Salin No. Rekening</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="bi bi-wallet2 me-2"></i> E-Wallet
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionHadiah">
                            <div class="accordion-body">
                                <img src="https://via.placeholder.com/200x200.png?text=QR+Code" alt="QR Code" class="img-fluid">
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
                <p class="text-muted text-center mb-4" data-aos="fade-up" data-aos-delay="100">Berikan ucapan dan doa restu Anda kepada kami.</p>
                <form data-aos="fade-up" data-aos-delay="200">
                    <div class="mb-3">
                        <label for="namaTamu" class="form-label">Nama Anda</label>
                        <input type="text" class="form-control" id="namaTamu" required>
                    </div>
                    <div class="mb-3">
                        <label for="konfirmasi" class="form-label">Konfirmasi Kehadiran</label>
                        <select class="form-select" id="konfirmasi">
                            <option selected>Pilih salah satu</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ucapanTamu" class="form-label">Ucapan & Doa</label>
                        <textarea class="form-control" id="ucapanTamu" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Kirim Ucapan</button>
                </form>
            </div>
        </section>

        <footer class="text-center py-5">
            <p class="text-muted">Merupakan suatu kebahagiaan bagi kami atas kehadiran dan doa restu dari Bapak/Ibu/Saudara/i.</p>
            <h2 class="display-font mt-4">Rian & Aulia</h2>
            <p class="mt-4 small">&copy; 2025 Dibuat dengan cinta.</p>
        </footer>

    </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        // --- Buka Undangan & Musik ---
        const cover = document.getElementById('cover');
        const mainContent = document.getElementById('main-content');
        const bukaUndanganBtn = document.getElementById('bukaUndangan');
        const audio = document.getElementById('background-music');
        const playPauseBtn = document.getElementById('play-pause-btn');

        bukaUndanganBtn.addEventListener('click', () => {
            cover.classList.add('hidden');
            mainContent.style.display = 'block';
            audio.play();
            playPauseBtn.innerHTML = '<i class="bi bi-pause-fill"></i>';

            // Inisialisasi AOS setelah undangan dibuka
            AOS.init({
                duration: 1000,
                once: true,
            });

            // Hapus cover dari DOM setelah animasi selesai agar bisa scroll
            setTimeout(() => {
                cover.style.display = 'none';
            }, 1000);
        });

        playPauseBtn.addEventListener('click', () => {
            if (audio.paused) {
                audio.play();
                playPauseBtn.innerHTML = '<i class="bi bi-pause-fill"></i>';
            } else {
                audio.pause();
                playPauseBtn.innerHTML = '<i class="bi bi-music-note"></i>';
            }
        });

        // --- Countdown Timer ---
        // PENTING: GANTI TANGGAL ACARA DI SINI (Bulan dimulai dari 0: Jan=0, Feb=1, dst.)
        // Format: new Date("Bulan Hari, Tahun Jam:Menit:Detik")
        const weddingDate = new Date("Sep 27, 2025 11:00:00").getTime();

        const countdown = setInterval(function() {
            const now = new Date().getTime();
            const distance = weddingDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerText = days;
            document.getElementById("hours").innerText = hours;
            document.getElementById("minutes").innerText = minutes;
            document.getElementById("seconds").innerText = seconds;

            if (distance < 0) {
                clearInterval(countdown);
                document.getElementById("countdown").innerHTML = "Acara Telah Berlangsung";
            }
        }, 1000);

        // --- Salin No. Rekening ---
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('No. Rekening berhasil disalin!');
            }, function(err) {
                alert('Gagal menyalin No. Rekening.');
            });
        }
    </script>
</body>
</html>
