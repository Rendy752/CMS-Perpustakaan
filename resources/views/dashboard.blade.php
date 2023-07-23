@extends('master')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Grafik</h1>
                <div class="col-md-12">
                    <div class="d-flex justify-content-center traffic-status text-center mb-5">
                        @if(Auth::check())
                        @if (Auth::user()->role==='A') 
                        <div class="item mx-sm-5 mx-4 bg-primary rounded p-3">
                            <i class="fas fa-user fa-2x"></i><h3>User</h3>
                            <h5 class="font-weight-bold mb-0">{{ $user }}</h5>
                        </div>
                        @endif
                        @endif
                        <div class="item mx-sm-5 mx-4 bg-warning rounded p-3">
                            <i class="fa fa-book fa-2x"></i><h3>Buku</h3>
                            <h5 class="font-weight-bold mb-0">{{ $buku }}</h5>
                        </div>
                        <div class="item mx-sm-5 mx-4 bg-success rounded p-3">
                            <i class="fa fa-tag fa-2x"></i><h3>Kategori</h3>
                            <h5 class="font-weight-bold mb-0">{{ $kategori }}</h5>
                        </div>
                    </div>
                </div>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>

               @if(Auth::check())
                @if (Auth::user()->role==='A') 
                    <div class="card mb-4 mx-sm-5 mt-5">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i><span>Jumlah Buku User</span>
                            {{-- Jumlah Pesanan Buku (Total= Rp @foreach ($totalPenjualan as $data) {{ $data->jumlah }} @endforeach) --}}
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                @endif
                @endif

                {{-- css --}}
                <style>
                    .highcharts-figure,
                    .highcharts-data-table table {
                        min-width: 310px;
                        max-width: 800px;
                        margin: 1em auto;
                    }

                    #container {
                        height: 400px;
                    }

                    .highcharts-data-table table {
                        font-family: Verdana, sans-serif;
                        border-collapse: collapse;
                        border: 1px solid #ebebeb;
                        margin: 10px auto;
                        text-align: center;
                        width: 100%;
                        max-width: 500px;
                    }

                    .highcharts-data-table caption {
                        padding: 1em 0;
                        font-size: 1.2em;
                        color: #555;
                    }

                    .highcharts-data-table th {
                        font-weight: 600;
                        padding: 0.5em;
                    }

                    .highcharts-data-table td,
                    .highcharts-data-table th,
                    .highcharts-data-table caption {
                        padding: 0.5em;
                    }

                    .highcharts-data-table thead tr,
                    .highcharts-data-table tr:nth-child(even) {
                        background: #f8f8f8;
                    }

                    .highcharts-data-table tr:hover {
                        background: #f1f7ff;
                    }
                </style>


                {{-- js --}}

                <script>
                    Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Jumlah Kategori Buku'
                        },

                        xAxis: {

                            categories: [
                                @foreach ($bukuKategori as $item)
                                    '{{ $item->nama_kategori }}',
                                @endforeach
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            max: {{ $buku }},
                            title: {
                                text: 'Jumlah Kategori'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                            name: ' Jumlah',
                            data: [
                                @foreach ($bukuKategori as $item)
                                    {{ $item->jumlah_buku }},
                                @endforeach
                            ]

                        }]
                    });
                </script>
                
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>    
    <script>
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach ($bukuUser as $data)
                '{{ $data->nama_user }}',
                @endforeach
            ],
            datasets: [{
                label: "Jumlah Buku",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    @foreach ($bukuUser as $data)
                    '{{ $data->jumlah_buku }}',
                    @endforeach
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
    </script>
@endsection
