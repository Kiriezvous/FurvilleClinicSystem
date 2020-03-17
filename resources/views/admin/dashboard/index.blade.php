@extends('layouts.master')

@section('content')

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
                                <h3>0</h3>

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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Sales Chart
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
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




    <script>

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',
            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Sales Forecasting',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data:
                        [
                        @foreach($order_forecast as $sales)

                        {{$sales}}
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

        var ctx = document.getElementById('abcAnalytics').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',
            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Product Forecasting',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data:
                        [
                            @foreach($order_forecast as $sales)

                            {{$sales}}
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
    </script>

@endsection

