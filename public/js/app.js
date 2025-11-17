// Pastikan kamu sudah load jQuery sebelum script ini
$(document).ready(function() {
    $('#myModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Tombol yang di-klik
        var modal = $(this);

        // Ambil data dari tombol
        var id = button.data('id');
        var action_url = button.data('action_url');

        // Cek apakah ini tombol admin (punya data 'nama')
        if (button.data('nama')) {
            // INI UNTUK MODAL ADMIN
            var kode = button.data('kode');
            var nama = button.data('nama');
            var email = button.data('email');
            // ... (dan sisa variabel lainnya) ...
            var total_rupiah = button.data('total_rupiah');
            var bukti_url = button.data('bukti_url');
            var harga_paket_raw = button.data('harga_paket');
            var ppn_raw = button.data('ppn');

            // Fungsi format Rupiah di JS
            function formatRupiah(angka) {
                if (!angka) return 'Rp 0';
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(angka);
            }

            // Isi data ke modal admin
            modal.find('#admin-nama').val(nama);
            modal.find('#admin-email').val(email);
            modal.find('#admin-no_hp').val(button.data('no_hp'));

            modal.find('#admin-bukti-img').attr('src', bukti_url);
            modal.find('#admin-bukti-link').attr('href', bukti_url);

            modal.find('#admin-kode').text(kode);
            modal.find('#admin-paket').text(button.data('paket'));
            modal.find('#admin-harga-paket').text(formatRupiah(harga_paket_raw));
            modal.find('#admin-ppn').text(formatRupiah(ppn_raw));
            modal.find('#admin-total').text(total_rupiah);

            modal.find('#admin-form').attr('action', action_url);
            modal.find('#admin-form-id-input').val(id);
            if(button.data('status') === 1){
                modal.find('#konfir').prop('disabled', true);
            }

        } else {
            // INI UNTUK MODAL USER
            modal.find('#user-form').attr('action', action_url);
            modal.find('#user-form-id-input').val(id);
        }
    });
});
