@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="display-5 text-center mb-4">Admin Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Collections Today</h5>
                    <p class="card-text" id="collectionsToday">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Transactions Today</h5>
                    <p class="card-text" id="transactionsToday">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Collections This Week</h5>
                    <p class="card-text" id="collectionsThisWeek">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Transactions This Week</h5>
                    <p class="card-text" id="transactionsThisWeek">0</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <canvas id="weeklyEarningsChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="dailyEarningsChart"></canvas>
        </div>
    </div>
</div>
@endsection

@vite(['resources/js/dashboard.js'])