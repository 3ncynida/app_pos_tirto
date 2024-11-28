@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Products</span>
                        <span class="info-box-number">
                            {{ $countproduct }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Customers</span>
                        <span class="info-box-number">{{ $countcustomer }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">{{ $countuser }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill-wave"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transactions</span>
                        <span class="info-box-number">${{ number_format($counttotal, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Monthly Transactions Overview</h5>
                        <canvas id="myLineChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- script  untuk chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js"></script>
    <script>
        // Data dari PHP
        const months = @json($months); // Nama bulan langsung dari controller
        const totals = @json($totals); // Total transaksi dari controller

        // Ambil elemen canvas
        const ctx = document.getElementById('myLineChart').getContext('2d');

        // Data untuk chart
        const data = {
            labels: months, // Label sumbu X
            datasets: [{
                label: 'Monthly Transactions', // Nama dataset
                data: totals, // Data sumbu Y
                borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna area di bawah garis
                fill: true, // Apakah area di bawah garis diwarnai
                tension: 0.4 // Kurva pada garis
            }]
        };

        // Konfigurasi chart
        const config = {
            type: 'line', // Jenis chart
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top' // Posisi legend
                    },
                    tooltip: {
                        enabled: true // Tooltip aktif
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Months' // Judul untuk sumbu X
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Total Transactions' // Judul untuk sumbu Y
                        },
                        beginAtZero: true // Mulai dari nol
                    }
                }
            }
        };

        // Buat chart
        const myLineChart = new Chart(ctx, config);
    </script>
@endsection
