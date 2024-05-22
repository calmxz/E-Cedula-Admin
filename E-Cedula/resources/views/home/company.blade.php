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
    <div class="container mt-5">
        <h1 class="display-5 text-center mb-4">Companies Cedulas</h1>
        <button type="button" class="btn btn-primary d-none" id="updateModal" data-bs-toggle="modal"
            data-bs-target="#updateDataModal">
            Update Data
        </button>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search for companies" id="searchInput">
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
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
        </div>

        <!-- Company Modal -->
        <div class="modal fade" id="updateDataModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Company</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="company_name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="barangay" class="form-label">Barangay</label>
                                        <input type="text" class="form-control" id="barangay" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="municipality" class="form-label">Municipality</label>
                                        <input type="text" class="form-control" id="municipality" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="province" class="form-label">Province</label>
                                        <input type="text" class="form-control" id="province" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kind_of_organization" class="form-label">Kind of Organization</label>
                                        <input type="text" class="form-control" id="kind_of_organization" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nature_of_business" class="form-label">Nature of Business</label>
                                        <input type="text" class="form-control" id="nature_of_business" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="place_of_registration" class="form-label">Place of Registration</label>
                                        <input type="text" class="form-control" id="place_of_registration" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_of_registration" class="form-label">Date of Registration</label>
                                        <input type="date" class="form-control" id="date_of_registration" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="region" class="form-label">Region</label>
                                        <input type="text" class="form-control" id="region" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tin" class="form-label">TIN</label>
                                        <input type="text" class="form-control" id="tin" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gross_receipt" class="form-label">Gross Receipt</label>
                                        <input type="number" class="form-control" id="gross_receipt" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_community_tax_due" class="form-label">Total Community Tax Due</label>
                                        <input type="number" class="form-control" id="total_community_tax_due" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="interest" class="form-label">Interest</label>
                                        <input type="number" class="form-control" id="interest" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_amount_paid" class="form-label">Total Amount Paid</label>
                                        <input type="number" class="form-control" id="total_amount_paid" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="save">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/companies.js'])
</body>

</html>
@endsection
