@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css'])
    <!-- Import Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1 class="display-5 text-center mb-4">Admin Dashboard</h1>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Collections Today</h5>
                        <p class="card-text" id="collectionsToday">Php 0.00</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transactions Today</h5>
                        <p class="card-text" id="transactionsToday">0</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Collections This Month</h5>
                        <p class="card-text" id="collectionsThisMonth">Php 0.00</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transactions This Month</h5>
                        <p class="card-text" id="transactionsThisMonth">0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="weeklyEarningsChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="totalEarningsChart"></canvas>
            </div>
        </div>
    </div>
    @vite(['resources/js/dashboard.js'])
    <!-- Import Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
@endsection