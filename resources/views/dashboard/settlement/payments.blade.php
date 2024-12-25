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
                                    <li class="breadcrumb-item active">Settlement Payment</li>
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
                        <div class="row mt-2 mb-4">
                            <a href="{{ url('settlement-payments-list') }}" class="text-light btn btn-primary mx-auto btn-icon-text">
                                Settlement Payment List
                            </a>
                        </div>

                        @if (isset($payment))
                            <form action="{{ route('settlement-payments-update', $payment->id) }}" method="post">
                        @else
                            <form action="{{ route('settlement-payments-store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row mx-3 ">

                        </div>
                        <div id="payment-container">
                            <!-- Payment Form Fields - This section will be duplicated -->
                            <div class="payment-row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Settlement ID. <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input name="settlement_id" type="text" class="form-control"
                                            placeholder="Enter Settlement ID" value="{{ @$payment->settlement_id }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">UTR number <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="utr_no" id=""
                                            placeholder="Enter UTR number" value="{{ @$payment->utr_no }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Net settlement <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="number" class="form-control" name="net_Settlement" id=""
                                            placeholder="Enter Net settlement" value="{{ @$payment->net_Settlement }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Status <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <select id="" name="status" class="form-control"
                                            style="background-color:white;" required>
                                            <option value="">Select Status</option>
                                            <option value="All" {{ old('status', @$payment->status) == 'All' ? 'selected' : '' }}>All</option>
                                            <option value="Created" {{ old('status', @$payment->status) == 'Created' ? 'selected' : '' }}>Created</option>
                                            <option value="Processed" {{ old('status', @$payment->status) == 'Processed' ? 'selected' : '' }}>Processed</option>
                                            <option value="Failed" {{ old('status', @$payment->status) == 'Failed' ? 'selected' : '' }}>Failed</option>
                                            <option value="Initiated" {{ old('status', @$payment->status) == 'Initiated' ? 'selected' : '' }}>Initiated</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Duration <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <select id="" name="duration" class="form-control"
                                            style="background-color:white;" required>
                                            <option value="">Select Duration</option>
                                            <option value="Today" {{ old('duration', @$payment->duration) == 'Today' ? 'selected' : '' }}>Today</option>
                                            <option value="Last 7 days" {{ old('duration', @$payment->duration) == 'Last 7 days' ? 'selected' : '' }}>Last 7 days</option>
                                            <option value="Last 30 days" {{ old('duration', @$payment->duration) == 'Last 30 days' ? 'selected' : '' }}>Last 30 days</option>
                                            <option value="Last 90 days" {{ old('duration', @$payment->duration) == 'Last 90 days' ? 'selected' : '' }}>Last 90 days</option>
                                            <option value="Custom Range" {{ old('duration', @$payment->duration) == 'Custom Range' ? 'selected' : '' }}>Custom Range</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Created on <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span>
                                        </label><br>
                                        <input type="text" class="form-control" name="created_on" id=""
                                            placeholder="Enter Created on"
                                            value="{{ $payment->created_on ?? '2024-12-25 07:10:31' }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <button type="submit" id="submit"
                                class="text-light btn btn-success mx-auto btn-icon-text">
                                <i class="fa fa-arrow-circle-right fa-lg"></i>
                                &nbsp;
                                @if (isset($payment))
                                    Update
                                @else
                                    Submit
                                @endif
                            </button>
                            </form>
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->

            </div><!-- container -->
        @endsection
