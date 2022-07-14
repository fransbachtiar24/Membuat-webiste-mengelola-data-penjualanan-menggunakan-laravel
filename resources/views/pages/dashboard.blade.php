@extends('layouts.master')

@section('title', 'dashboard')

@section('name', 'dashboard')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
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
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Jumlah Produk</p>
                        </div>
                        <div class="flex-shrink-0">
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{ $jumlahproduk }}</span></h4>
                            <a href="{{ url('produk') }}" class="text-decoration-underline">Lihat</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-success rounded fs-3">
                                <i class="bx bx-shopping-bag text-info"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Jumlah Kategori</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-danger fs-14 mb-0">
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{ $jumlahkategori }}</span></h4>
                            <a href="{{ url('kategori') }}" class="text-decoration-underline">Lihat</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-info rounded fs-3">
                                <i class="mdi mdi-alpha-c-circle-outline"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Pelanggan</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{ $jumlahpelanggan }}</span></h4>
                            <a href="#" class="text-decoration-underline">Lihat</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-warning rounded fs-3">
                                <i class="bx bx-user-circle text-warning"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Admin</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                @foreach ($Admin as $item)
                                    $item->admin
                                @endforeach
                            </h4>
                            <a href="{{ url('admin') }}" class="text-decoration-underline">lihat</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-primary rounded fs-3">
                                <i class=" ri-file-user-fill"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div> <!-- end row-->

    <div class="row">
        <div class="col-xl-8">
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/modules/drilldown.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

            <figure class="highcharts-figure">
                <div id="container"></div>
                <div class="card">
                    <div class="card-body">
                        <table class="table align-middle table-bordered" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Harga</th>
                                    <th>Total harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($laporan as $index => $item)
                                    <tr>
                                        <td>{{ $index + $laporan->firstItem() }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->nama_pelanggan }}</td>
                                        <td>{{ $item->jumlah_pesan }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->total_harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justifiy-content-end">
                            {{ $laporan->links() }}
                        </div>
                    </div>
                </div>
            </figure>
        </div><!-- end col -->

        <div class="col-xl-4">
            <!-- card -->
            <div class="card card-height-100">
                <!-- card body -->
                <div class="card-body">
                    <div id="map" style="width: 100%; height: 450px;"></div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    </div> <!-- end .h-100-->

    </div> <!-- end col -->


    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div> <!-- end card-->
    </div> <!-- end .rightbar-->
    </div> <!-- end col -->
    </div>
    <script>
        var peta1 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

        var peta2 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var peta4 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
            });

        var map = L.map('map', {
            center: [-2.973320800516636, 104.7643052388811],
            zoom: 12,
            layers: [peta1]
        });

        var baseMaps = {
            "Grayscale": peta1,
            "Satellite": peta2,
            "Streets": peta3,
            "Dark": peta4,
        };

        var layerControl = L.control.layers(baseMaps).addTo(map);
    </script>
    <script>
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'Pendapatan Perbulan Toko Velzon 2022'
            },
            subtitle: {
                align: 'left',
                text: 'Happy Shopping Day'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Keuntungan'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [{
                name: "Pendapatan",
                colorByPoint: true,
                data: [{
                        name: "January",
                        y: @foreach ($january as $item)
                            {{ $item->total }}
                        @endforeach ,
                        drilldown: "January"
                    },
                    {
                        name: "February",
                        y: @foreach ($february as $item)
                            {{ $item->february }}
                        @endforeach ,
                        drilldown: "February"
                    },
                    {
                        name: "Maret",
                        y: @foreach ($maret as $item)
                            {{ $item->maret }}
                        @endforeach ,
                        drilldown: "Maret"
                    },
                    {
                        name: "April",
                        y: @foreach ($april as $item)
                            {{ $item->april }}
                        @endforeach ,
                        drilldown: "April"
                    },
                    {
                        name: "Mei",
                        y: @foreach ($mei as $item)
                            {{ $item->mei }}
                        @endforeach ,
                        drilldown: "Mei"
                    },
                    {
                        name: "Juni",
                        y: @foreach ($juni as $item)
                            {{ $item->juni }}
                        @endforeach ,
                        drilldown: "Juni"
                    },
                    {
                        name: "July",
                        y: @foreach ($juli as $item)
                            {{ $item->juli }}
                        @endforeach ,
                        drilldown: "July"
                    },
                    {
                        name: "Agustust",
                        y: @foreach ($agustust as $item)
                            {{ $item->agustust }}
                        @endforeach ,
                        drilldown: "Agustust"
                    },
                    {
                        name: "September",
                        y: @foreach ($september as $item)
                            {{ $item->september }}
                        @endforeach ,
                        drilldown: null
                    },
                    {
                        name: "Oktober",
                        y: @foreach ($oktober as $item)
                            {{ $item->oktober }}
                        @endforeach ,
                        drilldown: "Oktober"
                    },
                    {
                        name: "November",
                        y: @foreach ($november as $item)
                            {{ $item->november }}
                        @endforeach ,
                        drilldown: "November"
                    },
                    {
                        name: "Desember",
                        y: @foreach ($desember as $item)
                            {{ $item->desember }}
                        @endforeach ,
                        drilldown: "Desember"
                    },
                ]
            }],
            drilldown: {
                breadcrumbs: {
                    position: {
                        align: 'right'
                    }
                },
                series: [{
                        name: "January",
                        id: "January",
                        data: [
                            [
                                "Total Jumlah Pesanan January",
                                @foreach ($january1 as $item)
                                    {{ $item->january1 }}
                                @endforeach
                            ],
                            [
                                "Total Customer Order",
                                @foreach ($cjanuary as $item)
                                    {{ $item->cjanuary }}
                                @endforeach
                            ]
                        ]
                    },
                    {
                        name: "February",
                        id: "February",
                        data: [
                            [
                                "Total Jumlah Pesanan February",
                                @foreach ($february2 as $item)
                                    {{ $item->february2 }}
                                @endforeach
                            ],
                            [
                                "Total Customer Order",
                                @foreach ($cfebruary as $item)
                                    {{ $item->cfebruary }}
                                @endforeach
                            ]
                        ]
                    },
                    {
                        name: "Maret",
                        id: "Maret",
                        data: [
                            [
                                "Total Jumlah Pesanan Maret",
                                @foreach ($maret2 as $item)
                                    {{ $item->maret2 }}
                                @endforeach
                            ],
                            [
                                "Total Customer Order",
                                @foreach ($cmaret as $item)
                                    {{ $item->cmaret }}
                                @endforeach
                            ]
                        ]
                    },
                    {
                        name: "April",
                        id: "April",
                        data: [
                            [
                                "Total Jumlah Pesanan April",
                                @foreach ($april2 as $item)
                                    {{ $item->april2 }}
                                @endforeach
                            ],
                            [
                                "Total Customer Order",
                                @foreach ($capril as $item)
                                    {{ $item->capril }}
                                @endforeach
                            ]
                        ]
                    },
                    {
                        name: "Mei",
                        id: "Mei",
                        data: [
                            [
                                "Total Jumlah Pesanan Mei",
                                @foreach ($mei2 as $item)
                                    {{ $item->mei2 }}
                                @endforeach
                            ],
                            [
                                "Total Customer Order",
                                @foreach ($cmei as $item)
                                    {{ $item->cmei }}
                                @endforeach
                            ]
                        ]
                    },
                    {
                        name: "Juni",
                        id: "Juni",
                        data: [
                            [
                                "Total Jumlah Pesanan Juni",
                                @foreach ($juni2 as $item)
                                    {{ $item->juni2 }}
                                @endforeach
                            ],
                            [
                                "Total Customer Order",
                                @foreach ($cjuni as $item)
                                    {{ $item->cjuni }}
                                @endforeach
                            ]
                        ]
                    }, {
                        name: "July",
                        id: "July",
                        data: [
                            [
                                "Total Jumlah Pesanan July",
                                @foreach ($juli2 as $item)
                                    {{ $item->juli2 }}
                                @endforeach
                            ],
                            [
                                "v49.0",
                                0.82
                            ]
                        ]
                    }, {
                        name: "Agustust",
                        id: "Agustust",
                        data: [
                            [
                                "Total Jumlah Pesanan Agustust",
                                @foreach ($agustust2 as $item)
                                    {{ $item->agustust2 }}
                                @endforeach
                            ],
                            [
                                "v49.0",
                                0.82
                            ]
                        ]
                    }, {
                        name: "September",
                        id: "September",
                        data: [
                            [
                                "Total Jumlah Pesanan Juni",
                                @foreach ($september2 as $item)
                                    {{ $item->september2 }}
                                @endforeach
                            ],
                            [
                                "v49.0",
                                0.82
                            ]
                        ]
                    }, {
                        name: "Oktober",
                        id: "Oktober",
                        data: [
                            [
                                "Total Jumlah Pesanan Juni",
                                0.96
                            ],
                            [
                                "v49.0",
                                0.82
                            ]
                        ]
                    }, {
                        name: "November",
                        id: "November",
                        data: [
                            [
                                "Total Jumlah Pesanan November",
                                @foreach ($november2 as $item)
                                    {{ $item->november2 }}
                                @endforeach
                            ],
                            [
                                "v49.0",
                                0.82
                            ]
                        ]
                    }, {
                        name: "Desember",
                        id: "Desember",
                        data: [
                            [
                                "Total Jumlah Pesanan Juni",
                                0.96
                            ],
                            [
                                "v49.0",
                                0.82
                            ]
                        ]
                    }
                ]
            }
        });
    </script>
@endsection
