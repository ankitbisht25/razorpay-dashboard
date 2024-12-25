@extends('layouts.master')
@section('dashboard')
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row mb-3">
                            <div class="col">
                                <h4 class="page-title">Settlements Payment List</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dastone</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Settlements</a></li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div><!--end col-->
                            <div class="col-auto align-self-center">
                                <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                    <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                                    <span class="" id="Select_date">Jan 11</span>
                                    <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
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
                        
                        <div class="row mt-2">
                            <a href="{{ url('settlement-payments') }}" class="text-light btn btn-primary mx-auto btn-icon-text">
                                Add New Settlement
                            </a>
                        </div>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Settlement ID</th>
                                    <th>UTR Number</th>
                                    <th>Net Settlement</th>
                                    <th>Status</th>
                                    <th>Duration</th>
                                    <th>Created on</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->settlement_id }}</td>
                                        <td>{{ $payment->utr_no }}</td>
                                        <td>Rs. {{ $payment->net_Settlement }}</td>
                                        <td><span class="badge badge-soft-pink">{{ $payment->status }}</span></td>
                                        <td>{{ $payment->duration }}</td>
                                        <td>{{ $payment->created_on }}</td>
                                        <td>
                                            <a href="{{ route('settlement-payments-edit', $payment->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                                            <a href="{{ route('settlement-payments-delete', $payment->id) }}"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->
    @endsection
