@extends('layout.header')
@title('Dashoard')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pengguna</h5>
                    <h2 id="user-count">0</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Undangan</h5>
                    <h2 id="invitation-count">0</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card text-center mb-4">
                <canvas id="userPurchasesChart" class="mb-4"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const userCount = "{{ $counts['users'] ?? 0 }}";
            const invitationCount = "{{ $counts['invitations'] ?? 0 }}";
            const paymentCount = "{{ $counts['payments'] ?? 0 }}";

            // Display counts
            document.getElementById('user-count').textContent = userCount;
            document.getElementById('invitation-count').textContent = invitationCount;

            // Bar Chart
            const ctx = document.getElementById('userPurchasesChart').getContext('2d');
            const userPurchasesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Pelanggan', 'Pembelian'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [userCount, paymentCount],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
