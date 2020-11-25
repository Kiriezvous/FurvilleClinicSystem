
@extends('layouts.staff')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="card text-white bg-danger">
                    <div class="card-body">
                        You have {{count($stocks)}} stocks running low. Please check your <a href="{{route('products.index')}}" class="btn btn-dark">inventory</a> !
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>&nbsp;{!! count($User) !!}&nbsp;</h3>

                                <p>Users Registered</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/clients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>&nbsp;{{count($Products)}}&nbsp;</h3>

                                <p>Products</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/products" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>&nbsp;{{count($Patients)}}&nbsp;</h3>

                                <p>Patients</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/patients" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{count($SubOrders)}}</h3>

                                <p>Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    {{--                    <div>--}}
                    {{--                        <!-- BUTTON SA VIEW NG PDF -->--}}
                    {{--                        <a href="{{route('view.muna')}}">CLICK SA VIEW USER PDF</a>--}}
                    {{--                    </div>--}}

                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Sales Chart
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        ABC Analytics Chart
                    </div>
                    <div class="card-body">
                        <canvas id="abcAnalytics"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>

        var ctx2 = document.getElementById('myChart').getContext('2d');
        var chart2 = new Chart(ctx2, {
            // The type of chart we want to create
            type: 'line',
            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Sales',
                    borderColor: 'rgb(255, 99, 132)',
                    data:
                        [

                            @foreach($totalsales as $sales)

                            {{$sales}},
                            @endforeach


                        ]

                }, {
                    label: 'Forecasted',
                    borderColor: 'rgb(255, 360, 0)',
                    data:
                        [
                            0,
                            @foreach($totalsales as $sales)

                            {{$sales}},
                            @endforeach
                            @foreach($order_forecast as $s)

                            {{$s}},
                            @endforeach


                        ]
                }]

            },

            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false,
                // scale: {
                //     yAxes: [
                //         {
                //             ticks: {
                //                 beginAtZero: true,
                //             }
                //         }
                //     ]
                // }
            }
        });

        var ctx1 = document.getElementById('abcAnalytics').getContext('2d');
        var chart1 = new Chart(ctx1, {
            // The type of chart we want to create
            type: 'line',
            // The data for our dataset
            data: {
                labels: [0,
                    @foreach($cm as $p)
                    {{$p}},
                    @endforeach
                        100],
                datasets: [{
                    label: 'Product Forecasting',
                    borderColor: 'rgb(255, 99, 132)',
                    data:

                        [
                            0,
                            @foreach($cm as $p)
                            {{$p}},
                            @endforeach
                                100
                        ],


                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false,
                yAxes: {
                    reverse: true,
                },
            }
        });

    </script>
    <!-- /.content -->
@endsection

