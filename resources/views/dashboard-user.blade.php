@extends('layout.header')
@title('Dashoard')
@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row p-t-10 p-b-10">
                        <!-- Column -->
                        <div class="col p-r-0">
                            <h1 class="font-light">{{ $data['count'] }}</h1>
                            <h6 class="text-muted">Jumlah Undangan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ucapan Tamu</h4>
                    <div class="table-responsive">
                        <table id="lang_opt" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Undangan</th>
                                    <th>Nama</th>
                                    <th>Ucapan</th>
                                    <th>Kehadiran</th>
                                    <th>Tgl. Ucapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['ucapans'] as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->wedding->slug }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->ucapan }}</td>
                                        <td>{{ $row->kehadiran }}</td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
