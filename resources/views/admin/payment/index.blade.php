@extends('layout.header')
@title('Payment')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Management Payment</h4>
                    <div class="table-responsive">
                        <table id="lang_opt" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Pemesanan</th>
                                    <th>Name</th>
                                    <th>Paket</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->kode }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ ucfirst($row->paket) }}</td>

                                        <td>Rp {{ number_format($row->jumlah, 0, ',', '.') }}</td>

                                        <td
                                            class="
                                            @if ($row->status === 0) @if ($row->bukti_pembayaran === null)
                                                    text-danger
                                                @else
                                                    text-warning @endif
@else
text-success
                                            @endif
                                            ">
                                            @if ($row->status === 0)
                                                @if ($row->bukti_pembayaran === null)
                                                    Bayar sekarang
                                                @else
                                                    Diproses
                                                @endif
                                            @else
                                                Selesai
                                            @endif
                                        </td>

                                        @if (auth()->user()->role === 'admin')
                                            <td>
                                                <button type="button" class="btn btn-info rounded-pill" data-toggle="modal"
                                                    data-target="#myModal" data-id="{{ $row->id }}"
                                                    data-kode="{{ $row->kode }}" data-nama="{{ $row->user->name }}"
                                                    data-email="{{ $row->user->email }}"
                                                    data-no_hp="{{ $row->user->no_hp }}"
                                                    data-paket="{{ ucfirst($row->paket) }}"
                                                    data-harga_paket="{{ $row->harga_paket }}"
                                                    data-ppn="{{ $row->ppn }}" data-total_raw="{{ $row->jumlah }}"
                                                    data-total_rupiah="Rp {{ number_format($row->jumlah, 0, ',', '.') }}"
                                                    data-bukti_url="{{ $row->bukti_pembayaran ? asset('storage/' . $row->bukti_pembayaran) : '#' }}"
                                                    data-action_url="{{ route('konfirmasi') }}"
                                                    data-status="{{ $row->status }}">View</button>
                                            </td>
                                        @else
                                            <td>
                                                <button type="button" class="btn btn-info rounded-pill" data-toggle="modal"
                                                    data-target="#myModal" data-id="{{ $row->id }}"
                                                    data-action_url="{{ route('image.payment') }}"
                                                    @if ($row->bukti_pembayaran !== null) @disabled(true) @endif>
                                                    Konfirmasi Pembayaran
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data Tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>No Pemesanan</th>
                                    <th>Name</th>
                                    <th>Paket</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        @if (auth()->user()->role === 'admin')
                            Konfirmasi Pesanan
                        @else
                            Konfirmasi Pembayaran
                        @endif
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                @if (auth()->user()->role === 'admin')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-7">
                                <h5><i class="fas fa-user"></i> Detail Pemesan</h5>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="admin-nama" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="admin-email" disabled>
                                </div>
                                <div class="form-group">
                                    <label>No. Handphone</label>
                                    <input type="text" class="form-control" id="admin-no_hp" disabled>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label>Bukti Pembayaran:</label>
                                <a id="admin-bukti-link" href="#" target="_blank" title="Klik untuk perbesar">
                                    <img id="admin-bukti-img" src="" alt="Bukti Pembayaran"
                                        class="img-fluid rounded border"
                                        style="width: 100%; height: 250px; object-fit: cover;">
                                </a>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5><i class="fas fa-file-invoice-dollar"></i> Detail Pesanan</h5>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="text-muted">No Pemesanan:</span>
                                            <strong style="font-size: 1.1rem;" id="admin-kode"></strong>
                                        </div>
                                        <hr class="mt-2 mb-2" style="border-style: dashed;">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="text-muted">Paket:</span>
                                            <strong style="font-size: 1.1rem;" id="admin-paket"></strong>
                                        </div>
                                        <hr class="mt-2 mb-2" style="border-style: dashed;">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Total:</h5>
                                            <h5 class="mb-0 text-success" style="font-weight: bold;" id="admin-total">
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <form id="admin-form" action="" method="post" style="width: 100%;">
                            @csrf
                            <input type="hidden" class="form-control" name="id" id="admin-form-id-input">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-secondary mr-2"
                                    data-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-success" id="konfir">Konfirmasi</button>
                            </div>
                        </form>
                    </div>
                @else
                    <form id="" action="{{ route('image.payment') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                                <input type="hidden" class="form-control" name="id" id="user-form-id-input">
                                <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran"
                                    accept="image/png, image/jpeg" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>


@endsection
