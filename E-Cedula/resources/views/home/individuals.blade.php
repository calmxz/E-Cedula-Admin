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
                    <th>CCI2024 No.</th>
                    <th>Date Created</th>
                    <th>Last Name</th>
                    <th>Middle Name</th>
                    <th>First Name</th>
                    <th>Extension Name</th>
                    <th>Sex</th>
                    <th>Region</th>
                    <th>Province</th>
                    <th>Municipality</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                    <th>Civil Status</th>
                    <th>Citizenship</th>
                    <th>ICR No.</th>
                    <th>Height(ft)</th>
                    <th>Weight(kg)</th>
                    <th>Employed?</th>
                    <th>TIN</th>
                    <th>Profession/Occupation/Business</th>
                    <th>Salaries/Gross Receipt</th>
                    <th>Total Community Tax Due</th>
                    <th>Interest</th>
                    <th>Total Amount Paid</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    @vite(['resources/js/individuals.js'])
</body>
</html>


@endsection