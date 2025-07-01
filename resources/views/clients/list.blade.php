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
                                <h4 class="page-title">Client List</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dastone</a></li>
                                    <li class="breadcrumb-item active">Client List</li>
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
                            <a href="{{ url('clients/create') }}" class="text-light btn btn-primary mx-auto btn-icon-text">
                                Add New Client
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
                                    <th width="50px">S. No.</th>
                                    <th>Clients</th>
                                    <th>Switch Client</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>
                                            <form method="GET" action="{{ url()->current() }}">
                                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                                <button type="submit" class="btn btn-primary">
                                                    Select Client
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->
    @endsection
