@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Simple App</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="container">
        <h1 class="display-5">Individuals Cedulas</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>CCC2024 No.</th>
                    <th>Date Created</th>
                    <th>Company Name</th>
                    <th>Barangay</th>
                    <th>Municipality</th>
                    <th>Province</th>
                    <th>Kind of Organization</th>
                    <th>Nature of Business</th>
                    <th>Place of Registration</th>
                    <th>Date of Registration</th>
                    <th>Region</th>
                    <th>TIN</th>
                    <th>Gross Receipt</th>
                    <th>Total Community Tax Due</th>
                    <th>Interest</th>
                    <th>Total Amount Paid</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    @vite(['resources/js/companies.js'])
</body>
</html>


@endsection