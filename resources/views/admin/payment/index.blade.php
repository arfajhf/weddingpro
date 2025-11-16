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
                                    <th>Name</th>
                                    <th>Paket</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    @if (auth()->user()->role === 'admin')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->paket }}</td>
                                        <td>{{ $row->jumlah }}</td>
                                        <td
                                            class="
                                        @if ($row->status === 0) text-warning
                                        @else
                                        text-success @endif
                                        ">
                                            @if ($row->status === 0)
                                                Diproses
                                            @else
                                                Selesai
                                            @endif
                                        </td>
                                        @if (auth()->user()->role === 'admin')
                                            <td>
                                                <a href="#" class="btn btn-info rounded-pill">View</a>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Paket</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    @if (auth()->user()->role === 'admin')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
