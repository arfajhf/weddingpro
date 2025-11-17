@extends('layout.header')
@title('Berlangganan')
@section('content')

@if(!empty($undangans) && $undangans->count())
    <style>
        /* small tweaks */
        .card-guest { border-radius: 12px; overflow: hidden; box-shadow: 0 6px 18px rgba(0,0,0,0.06); }
        .card-guest .card-img-top { height: 160px; object-fit: cover; }
        .badge-status { font-size: 12px; padding: 0.35rem 0.55rem; border-radius: 999px; }
        .btn-icon { padding: .375rem .6rem; font-size: .85rem; }
        .copy-toast { position: fixed; right: 20px; bottom: 20px; z-index: 1080; display: none; }
        @media (max-width: 767px) {
            .card-guest .card-img-top { height: 140px; }
        }
    </style>

    <div class="mb-4">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h5 class="m-0">Undangan Terbaru</h5>
            <a href="{{ route('undangan.create') }}" class="btn btn-sm btn-primary">Buat Undangan</a>
        </div>

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

        <div class="row g-3">
            @foreach($undangans as $u)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-guest h-100">
                        @php
                            $heroUrl = $u->foto_hero_url ?? ($u->foto_hero ? Storage::url($u->foto_hero) : asset('images/placeholder-hero.png'));
                            $dateStr = $u->tanggal_resepsi ? ($u->tanggal_resepsi instanceof \Illuminate\Support\Carbon ? $u->tanggal_resepsi->format('d M Y') : \Carbon\Carbon::parse($u->tanggal_resepsi)->format('d M Y')) : '';
                        @endphp

                        <img src="{{ $heroUrl }}" class="card-img-top" alt="Sampul {{ $u->nama_wanita }} & {{ $u->nama_pria }}">

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div style="min-width:0">
                                    <h6 class="card-title mb-0 text-truncate" title="{{ $u->nama_wanita }} & {{ $u->nama_pria }}">
                                        {{ $u->nama_wanita }} &amp; {{ $u->nama_pria }} <small class="text-muted"></small>
                                    </h6>
                                    <p class="small text-muted mb-0">{{ $dateStr }} @if($u->waktu_resepsi) • {{ $u->waktu_resepsi }} @endif</p>
                                </div>
                            </div>

                            <div class="mt-auto">
                                <div class="d-grid gap-2">
                                    <a href="{{ url($u->slug) }}" target="_blank" class="btn btn-sm btn-primary">Lihat Undangan</a>

                                    <div class="d-flex gap-2 mt-2">
                                        <a href="{{ route('undangan.edit', $u->id) }}" class="btn btn-outline-secondary btn-icon flex-fill" title="Edit">
                                            ✏️ Edit
                                        </a>

                                        <button type="button" class="btn btn-outline-secondary btn-icon flex-fill" onclick="copyLink('{{ url($u->slug) }}')" title="Salin link">
                                            📋 Salin
                                        </button>

                                        <button type="button" class="btn btn-outline-danger btn-icon flex-fill" onclick="openDeleteModal('{{ $u->id }}', '{{ $u->nama_wanita }} & {{ $u->nama_pria }}')" title="Hapus">
                                            🗑️ Hapus
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <button
                                            type="button"
                                            class="btn btn-outline-secondary btn-sm mt-2 d-block w-100"
                                            onclick="openGaleriModal('galeriModal-{{ $u->id }}')"
                                        >
                                            🖼️ Kelola Galeri
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="galeriModal-{{ $u->id }}" tabindex="-1" aria-labelledby="galeriModalLabel-{{ $u->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                      <form action="{{ route('undangan.galeri.store', $u->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                          <h5 class="modal-title" id="galeriModalLabel-{{ $u->id }}">
                              Upload Galeri — {{ $u->nama_wanita }} &amp; {{ $u->nama_pria }}
                          </h5>
                          <button type="button" class="btn-close" onclick="closeGaleriModal('galeriModal-{{ $u->id }}')" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                          <p class="small text-muted">
                              Unggah hingga 6 foto. Mengunggah foto baru akan menimpa foto sebelumnya untuk slot tersebut.
                          </p>

                          <div class="row g-2">
                            @php
                $galeri = $u->galeries->first(); // asumsi 1 row galeri per undangan
            @endphp
                            @for($i = 1; $i <= 6; $i++)
                                @php
                                    $field = 'image' . $i;
                                    $currentUrl = $galeri && $galeri->{$field} ? Storage::url($galeri->{$field}) : asset('images/placeholder-hero.png');
                                @endphp

                                <div class="col-6 col-md-4">
                                    <label class="d-block small mb-1">Foto {{ $i }}</label>

                                    <div class="mb-2" style="height:120px; background:#f6f6f6; border-radius:8px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                                        <img
                                            id="preview-{{ $u->id }}-{{ $i }}"
                                            src="{{ $currentUrl }}"
                                            alt="Preview {{ $i }}"
                                            style="width:100%; height:100%; object-fit:cover;"
                                        >
                                    </div>

                                    <input
                                        type="file"
                                        name="{{ $field }}"
                                        accept="image/*"
                                        class="form-control form-control-sm"
                                        onchange="previewGaleri(event, '{{ $u->id }}', {{ $i }})"
                                    >
                                </div>
                            @endfor
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" onclick="closeGaleriModal('galeriModal-{{ $u->id }}')">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan Galeri</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3">
            {{ $undangans->links() }}
        </div>
    </div>


    <!-- Delete confirmation modal (Bootstrap 5) -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Hapus Undangan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="deleteModalBody">Yakin mau menghapus undangan ini?</p>
                        <div class="text-muted small">Tindakan ini tidak dapat dibatalkan.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="copyToast" class="copy-toast alert alert-success" role="alert">Link disalin ke clipboard ✅</div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window._deleteModalEl = document.getElementById('deleteModal');
            if (!window._deleteModalEl) return;

            window._deleteModal = new bootstrap.Modal(window._deleteModalEl);
            window.openDeleteModal = function(id, title) {
                // set body text
                var body = document.getElementById('deleteModalBody');
                body.textContent = 'Yakin mau menghapus undangan: ' + title + ' ?';

                // set form action -> route /undangan/destroy/{id}
                var form = document.getElementById('deleteForm');
                form.action = '{{ url("undangan/destroy") }}/' + id;

                window._deleteModal.show();
            };

            window.closeDeleteModal = function() {
                if (window._deleteModal) window._deleteModal.hide();
            };

            document.querySelectorAll('[data-bs-dismiss]').forEach(btn => {
                btn.addEventListener('click', function (e) {
                    if (window.closeDeleteModal) {
                        window.closeDeleteModal();
                    } else if (window._deleteModal) {
                        window._deleteModal.hide();
                    }
                });
            });
        });

        function openGaleriModal(modalId) {
            var el = document.getElementById(modalId);
            if (!el) return;

            try {
                if (window.bootstrap && bootstrap.Modal) {
                    var m = new bootstrap.Modal(el);
                    m.show();
                    // optionally simpan instance kalau mau dipakai nutup manual
                    el._bsModalInstance = m;
                } else if (window.jQuery && typeof $(el).modal === 'function') {
                    $(el).modal('show');
                }
            } catch (e) {
                console.error(e);
            }
        }

        function closeGaleriModal(modalId) {
            var el = document.getElementById(modalId);
            if (!el) return;

            try {
                if (el._bsModalInstance) {
                    el._bsModalInstance.hide();
                } else if (window.bootstrap && bootstrap.Modal) {
                    var m = bootstrap.Modal.getInstance(el) || new bootstrap.Modal(el);
                    m.hide();
                } else if (window.jQuery && typeof $(el).modal === 'function') {
                    $(el).modal('hide');
                }
            } catch (e) {
                console.error(e);
            }
        }

        function copyLink(url) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(url).then(() => showToast());
            } else {
                // fallback
                const el = document.createElement('textarea');
                el.value = url;
                el.setAttribute('readonly', '');
                el.style.position = 'absolute';
                el.style.left = '-9999px';
                document.body.appendChild(el);
                el.select();
                document.execCommand('copy');
                document.body.removeChild(el);
                showToast();
            }
        }

        function showToast() {
            const t = document.getElementById('copyToast');
            t.style.display = 'block';
            setTimeout(() => t.style.display = 'none', 1800);
        }
    </script>
@endif

@endsection
