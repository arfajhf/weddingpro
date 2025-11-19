@extends('layout.header')
@title('Dashoard')
@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row p-t-10 p-b-10">
                        <!-- Column -->
                        <div class="col p-r-0">
                            <h1 class="font-light">{{ $data['coun'] }}</h1>
                            <h6 class="text-muted">Jumlah Undangan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
