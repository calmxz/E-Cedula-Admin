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
        <h1 class="display-5 text-center mb-4">Individuals Cedulas</h1>
        <button type="button" class="btn btn-primary d-none" id="updateModal" data-bs-toggle="modal"
            data-bs-target="#individualModal">
            Update Individual
        </button>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search for individuals" id="searchInput">
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>CCI2024No</th>
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
                        <th>ICR No</th>
                        <th>Height (ft)</th>
                        <th>Weight (kg)</th>
                        <th>Employed</th>
                        <th>TIN</th>
                        <th>Profession</th>
                        <th>Gross Earnings</th>
                        <th>Taxable Amount</th>
                        <th>Basic Community Tax</th>
                        <th>Community Tax Due</th>
                        <th>Total</th>
                        <th>Interest</th>
                        <th>Total Amount Paid</th>
                        <th>Payment Method</th>
                        <th>Payment Reference Number</th>
                        <th>Ticket Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <!-- Individual Modal -->
        <div class="modal fade" id="individualModal" tabindex="-1" aria-labelledby="individualModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="individualModalLabel">Update Individual</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="individualForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- First Column Fields -->
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="middle_name" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="middle_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="extension_name" class="form-label">Extension Name</label>
                                        <input type="text" class="form-control" id="extension_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="sex" class="form-label">Sex</label>
                                        <input type="text" class="form-control" id="sex" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="region" class="form-label">Region</label>
                                        <input type="text" class="form-control" id="region" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="province" class="form-label">Province</label>
                                        <input type="text" class="form-control" id="province" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="municipality" class="form-label">Municipality</label>
                                        <input type="text" class="form-control" id="municipality" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="date_of_birth" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="place_of_birth" class="form-label">Place of Birth</label>
                                        <input type="text" class="form-control" id="place_of_birth" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Second Column Fields -->
                                    <div class="mb-3">
                                        <label for="civil_status" class="form-label">Civil Status</label>
                                        <input type="text" class="form-control" id="civil_status" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="citizenship" class="form-label">Citizenship</label>
                                        <input type="text" class="form-control" id="citizenship" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="icr_no" class="form-label">ICR No.</label>
                                        <input type="text" class="form-control" id="icr_no">
                                    </div>
                                    <div class="mb-3">
                                        <label for="height" class="form-label">Height</label>
                                        <input type="text" class="form-control" id="height" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Weight</label>
                                        <input type="text" class="form-control" id="weight">
                                    </div>
                                    <div class="mb-3">
                                        <label for="employed" class="form-label">Employed</label>
                                        <input type="text" class="form-control" id="employed" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tin" class="form-label">TIN</label>
                                        <input type="text" class="form-control" id="tin">
                                    </div>
                                    <div class="mb-3">
                                        <label for="profession" class="form-label">Profession</label>
                                        <input type="text" class="form-control" id="profession" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gross_earnings" class="form-label">Gross Earnings</label>
                                        <input type="number" step="0.01" class="form-control" id="gross_earnings"
                                            required>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="taxable_amount" class="form-label">Taxable Amount</label>
                                        <input type="number" step="0.01" class="form-control" id="taxable_amount"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="basic_community_tax" class="form-label">Basic Community Tax</label>
                                        <input type="number" step="0.01" class="form-control" id="basic_community_tax"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="community_tax_due" class="form-label">Community Tax Due</label>
                                        <input type="text" class="form-control" id="community_tax_due" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total" class="form-label">Total</label>
                                        <input type="number" step="0.01" class="form-control" id="total" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="interest" class="form-label">Interest</label>
                                        <input type="number" step="0.01" class="form-control" id="interest" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_amount_paid" class="form-label">Total Amount Paid</label>
                                        <input type="number" step="0.01" class="form-control" id="total_amount_paid"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment_method" class="form-label">Payment Method</label>
                                        <input type="text" class="form-control" id="payment_method" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment_reference_number" class="form-label">Payment Reference
                                            Number</label>
                                        <input type="text" class="form-control" id="payment_reference_number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ticket_number" class="form-label">Ticket Number</label>
                                        <input type="text" class="form-control" id="ticket_number" required>
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
    @vite(['resources/js/individuals.js'])
</body>

</html>


@endsection