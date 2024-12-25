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
                                    <li class="breadcrumb-item active">Settlement Overview</li>
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
                        <form action="{{ route('settlement-overview-store') }}" method="post">
                            @csrf
                            <div class="row mx-3 ">

                            </div>
                            <div id="payment-container">
                                <!-- Payment Form Fields - This section will be duplicated -->
                                <div class="payment-row">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Current Balance</label><br>
                                            <input type="number" class="form-control" name="current_balance" id=""
                                                placeholder="Enter Current Balance" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Settlement Due Today</label><br>
                                            <input type="number" class="form-control" name="settlement_due_today" id=""
                                                placeholder="Enter Settlement Due Today" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Previous Settlement</label><br>
                                            <input type="number" class="form-control" name="previous_settlement" id=""
                                                placeholder="Enter Previous Settlement" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="m-2 fw-bold">Upcoming Settlement</label><br>
                                            <input type="number" class="form-control" name="upcoming_settlement" id=""
                                                placeholder="Enter Upcoming Settlement" required>
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
