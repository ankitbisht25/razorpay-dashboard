@extends('layouts.master')
@section('dashboard')
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row mb-4">
                            <div class="col">
                                <h4 class="page-title">Admin Dashboard</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Transaction Overview</li>
                                </ol>
                            </div><!--end col-->
                            <div class="col-auto align-self-center">
                                <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                    <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                                    <span class="" id="Select_date">Jan 11</span>
                                    <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i data-feather="download" class="align-self-center icon-xs"></i>
                                </a>
                            </div><!--end col-->
                        </div><!--end row-->

                        <!-- Display Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('transaction-overview-store') }}" method="post">
                            @csrf
                            <div class="row mx-3 ">

                            </div>
                            <div id="payment-container">
                                <!-- Payment Form Fields - This section will be duplicated -->
                                <div class="payment-row">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Collected Amount</label><br>
                                            <input type="number" class="form-control" name="collected_amount" id=""
                                                placeholder="Enter Collected Amount" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Captured Payments</label><br>
                                            <input type="number" class="form-control" name="captured_payment" id=""
                                                placeholder="Enter Captured Payments" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Refunds</label><br>
                                            <input type="number" class="form-control" name="refunds" id=""
                                                placeholder="Enter Refunds" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Processed</label><br>
                                            <input type="number" class="form-control" name="processed" id=""
                                                placeholder="Enter Processed" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Disputes</label><br>
                                            <input type="number" class="form-control" name="disputes" id=""
                                                placeholder="Enter Disputes" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Open</label><br>
                                            <input type="number" class="form-control" name="open" id=""
                                                placeholder="Enter Open" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Under Review</label><br>
                                            <input type="number" class="form-control" name="under_review" id=""
                                                placeholder="Enter Under Review" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Failed Payments</label><br>
                                            <input type="number" class="form-control" name="failed_payments" id=""
                                                placeholder="Enter Failed Payments" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Orders</label><br>
                                            <input type="number" class="form-control" name="orders" id=""
                                                placeholder="Enter Orders" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Duration <span
                                                    style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                            <select id="" name="duration" class="form-control"
                                                style="background-color:white;" required>
                                                <option value="">Select Duration</option>
                                                <option value="Today">Today</option>
                                                <option value="Last 7 days">Last 7 days</option>
                                                <option value="Last 30 days">Last 30 days</option>
                                                <option value="Last 90 days">Last 90 days</option>
                                                <option value="Jan 2024 - till date">Jan 2024 - till date</option>
                                                <option value="This financial year">This financial year</option>
                                                <option value="Custom">Custom</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <button type="submit" id="submit"
                                    class="text-light btn btn-success mx-auto btn-icon-text">
                                    <i class="fa fa-arrow-circle-right fa-lg"></i>
                                    &nbsp;Submit
                                </button>
                        </form>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->
            <!-- end page title end breadcrumb -->

        </div><!-- container -->
    @endsection
