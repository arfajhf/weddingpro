@extends('layout.header')
@title('Berlangganan')
@section('content')
    <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-md-10 col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"><u>Lakukan Pemesanan</u></h4>
                            <div class="row">

                                <div class="col-sm-12 col-md-6 col-lg-6">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="name"
                                                    value="{{ auth()->user()->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    value="{{ auth()->user()->email }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No. Handphone</label>
                                        <input type="text" class="form-control" id="no_hp"
                                            value="{{ auth()->user()->no_hp }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="kode_pemesanan_display">Kode Pemesanan</label>
                                        <input type="text" class="form-control" id="kode_pemesanan_display"
                                            style="font-weight: bold; color: #007bff;" disabled>
                                    </div>

                                    <hr>

                                    <form class="m-t-20" action="" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="paket">Pilih Paket Berlangganan</label>
                                            <select name="paket" id="paket" class="form-control">
                                                <option selected disabled value="0" data-price="0">Pilih Paket...
                                                </option>
                                                <option value="hemat" data-price="69000">Paket Hemat | Rp.69.000</option>
                                                <option value="pro" data-price="99000">Paket Pro | Rp.99.000</option>
                                            </select>
                                        </div>

                                        <div id="rincian-biaya" class="mt-3 mb-3 p-3"
                                            style="border: 1px dashed #ccc; border-radius: 5px;">
                                            <h6 class="mb-2">Rincian Biaya:</h6>
                                            <div class="d-flex justify-content-between">
                                                <span>Harga Paket:</span>
                                                <strong id="harga-paket-text">Rp 0</strong>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>PPN (11%):</span>
                                                <strong id="harga-ppn-text">Rp 0</strong>
                                            </div>
                                            <hr class="mt-2 mb-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0">Total:</h5>
                                                <h5 class="mb-0 text-success" id="harga-total-text">Rp 0</h5>
                                            </div>
                                        </div>

                                        <input type="hidden" name="kode" id="input_kode_pemesanan">
                                        <input type="hidden" name="harga_paket_submit" id="input_harga_paket">
                                        <input type="hidden" name="ppn_submit" id="input_ppn">
                                        <input type="hidden" name="jumlah" id="input_total_biaya">

                                        <div class="alert alert-info" role="alert">
                                            <strong>Perhatian!</strong> Mohon periksa kembali data, pilihan paket, dan
                                            jumlah tagihan Anda
                                            sebelum menekan tombol Pesan.
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Pesan</button>
                                            <button type="button" onclick="history.back()"
                                                class="btn btn-outline-secondary">Batal</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <h5 class="text-center">Informasi Pembayaran</h5>
                                    <p class="text-center">Silakan lakukan transfer ke salah satu rekening berikut:</p>

                                    <div class="alert alert-warning" role="alert">
                                        <strong>PENTING:</strong> Harap sertakan <strong>Kode Pemesanan</strong> Anda
                                        (dari form di sebelah kiri) di bagian <strong>catatan/berita transfer</strong> saat
                                        melakukan pembayaran.
                                    </div>
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Bank BCA</h5>
                                            <p class="card-text mb-1"><strong>No. Rekening:</strong> 1234567890</p>
                                            <p class="card-text mb-0"><strong>Atas Nama:</strong> PT. Nama Perusahaan Kamu
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Bank Mandiri</h5>
                                            <p class="card-text mb-1"><strong>No. Rekening:</strong> 0987654321</p>
                                            <p class="card-text mb-0"><strong>Atas Nama:</strong> PT. Nama Perusahaan Kamu
                                            </p>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted mt-3">
                                        *Pesanan Anda akan diproses setelah kami menerima konfirmasi pembayaran.
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Ambil elemen TAMPILAN
            const paketSelect = document.getElementById('paket');
            const hargaPaketEl = document.getElementById('harga-paket-text');
            const hargaPpnEl = document.getElementById('harga-ppn-text');
            const hargaTotalEl = document.getElementById('harga-total-text');

            // Ambil elemen INPUT HIDDEN
            const inputHargaPaket = document.getElementById('input_harga_paket');
            const inputPpn = document.getElementById('input_ppn');
            const inputTotal = document.getElementById('input_total_biaya');

            // Ambil elemen KODE PEMESANAN
            const kodeDisplayEl = document.getElementById('kode_pemesanan_display');
            const inputKodePemesanan = document.getElementById('input_kode_pemesanan');

            // Tarif PPN (11%)
            const TARIF_PPN = 0.11;

            // FUNGSI GENERATE KODE
            function generateOrderCode(prefix, length) {
                let result = prefix;
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                const charactersLength = characters.length;
                for (let i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            }

            // Generate kode sekali pas halaman di-load
            const newCode = generateOrderCode('ODR-', 9); // Total 12 karakter

            // Set nilai kode ke input tampilan DAN input hidden
            kodeDisplayEl.value = newCode;
            inputKodePemesanan.value = newCode;

            // Fungsi untuk format angka ke Rupiah
            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(angka);
            }

            // Fungsi utama untuk menghitung
            function hitungTotal() {
                const selectedOption = paketSelect.options[paketSelect.selectedIndex];
                const hargaDasar = parseInt(selectedOption.getAttribute('data-price')) || 0;

                const nilaiPpn = Math.round(hargaDasar * TARIF_PPN);
                const total = hargaDasar + nilaiPpn;

                // 1. Update TAMPILAN
                hargaPaketEl.innerText = formatRupiah(hargaDasar);
                hargaPpnEl.innerText = formatRupiah(nilaiPpn);
                hargaTotalEl.innerText = formatRupiah(total);

                // 2. Update INPUT HIDDEN
                inputHargaPaket.value = hargaDasar;
                inputPpn.value = nilaiPpn;
                inputTotal.value = total;
            }

            // Tambahkan 'event listener'
            paketSelect.addEventListener('change', hitungTotal);
            // Panggil fungsi hitungTotal sekali pas load
            hitungTotal();
        });
    </script>
@endsection
