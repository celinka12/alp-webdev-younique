@extends('layouts.admin.admin')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Dashboard</h1>
        <div class="row">
            <div class="col-sm-3 col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Customer</h5>
                            </div>

                        </div>
                        <h1 class="mt-1 mb-3">{{ $total_customer }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Product</h5>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $total_product }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Total Penjualan</h5>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $total_penjualan }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Total Pendapatan</h5>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3 text-success">Rp. {{ number_format($total_pendapatan, 0, ',', '.') }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Data Penjualan</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-dashboard-line"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "July", "Agustus",
                        "September", "Oktober", "November",
                        "Desember"
                    ],
                    datasets: [{
                        label: "Penjualan",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            {{ $total_pendapatan_bulan[1] }},
                            {{ $total_pendapatan_bulan[2] }},
                            {{ $total_pendapatan_bulan[3] }},
                            {{ $total_pendapatan_bulan[4] }},
                            {{ $total_pendapatan_bulan[5] }},
                            {{ $total_pendapatan_bulan[6] }},
                            {{ $total_pendapatan_bulan[7] }},
                            {{ $total_pendapatan_bulan[8] }},
                            {{ $total_pendapatan_bulan[9] }},
                            {{ $total_pendapatan_bulan[10] }},
                            {{ $total_pendapatan_bulan[11] }},
                            {{ $total_pendapatan_bulan[12] }}
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection
