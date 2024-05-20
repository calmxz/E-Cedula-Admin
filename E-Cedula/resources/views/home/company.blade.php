@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Cedula</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="container">
        <h1 class="display-5">Companies Cedulas</h1>
        <button type="button" class="btn btn-primary d-none" id="updateModal" data-bs-toggle="modal"
            data-bs-target="#updateDataModal">
            Update Data
        </button>

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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="updateDataModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Company</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm">
                            @csrf
                            <!-- First part -->
                            <div class="mb-3">
                                <label>Company Name</label>
                                <input type="text" class="form-control" id="company_name">
                            </div>
                            <div class="mb-3">
                                <label>Barangay</label>
                                <input type="text" class="form-control" id="barangay">
                            </div>
                            <div class="mb-3">
                                <label>Municipality</label>
                                <input type="text" class="form-control" id="municipality">
                            </div>
                            <div class="mb-3">
                                <label>Province</label>
                                <input type="text" class="form-control" id="province">
                            </div>
                            <!-- Second part -->
                            <div class="mb-3">
                                <label>Kind of Organization</label>
                                <input type="text" class="form-control" id="kind_of_organization">
                            </div>
                            <div class="mb-3">
                                <label>Nature of Business</label>
                                <input type="text" class="form-control" id="nature_of_business">
                            </div>
                            <div class="mb-3">
                                <label>Place of Registration</label>
                                <input type="text" class="form-control" id="place_of_registration">
                            </div>
                            <div class="mb-3">
                                <label>Date of Registration</label>
                                <input type="date" class="form-control" id="date_of_registration">
                            </div>
                            <div class="mb-3">
                                <label>Region</label>
                                <input type="text" class="form-control" id="region">
                            </div>
                            <!-- Third part -->
                            <div class="mb-3">
                                <label>TIN</label>
                                <input type="text" class="form-control" id="tin">
                            </div>
                            <div class="mb-3">
                                <label>Gross Receipt</label>
                                <input type="number" class="form-control" id="gross_receipt">
                            </div>
                            <div class="mb-3">
                                <label>Total Community Tax Due</label>
                                <input type="number" class="form-control" id="total_community_tax_due">
                            </div>
                            <div class="mb-3">
                                <label>Interest</label>
                                <input type="number" class="form-control" id="interest">
                            </div>
                            <div class="mb-3">
                                <label>Total Amount Paid</label>
                                <input type="number" class="form-control" id="total_amount_paid">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    @vite(['resources/js/companies.js'])
</body>

</html>


@endsection