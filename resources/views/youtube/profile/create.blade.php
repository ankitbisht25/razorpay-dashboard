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
                                <h4 class="page-title">User Profile Create</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Youtube</a></li>
                                    <li class="breadcrumb-item active">User Profile Create</li>
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
                            <a href="{{ url('youtube/user-profiles') }}"
                                class="text-light btn btn-primary mx-auto btn-icon-text">
                                User Profile List
                            </a>
                        </div>

                        @if (isset($profile))
                            <form action="{{ route('youtube.user-profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                            @else
                                <form action="{{ route('youtube.user-profiles.store') }}" method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row mx-3 ">

                        </div>
                        <div id="payment-container">
                            <!-- Payment Form Fields - This section will be duplicated -->
                            <div class="payment-row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Channel Name <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input name="channel_name" type="text" class="form-control"
                                            placeholder="Enter Channel Name" value="{{ @$profile->channel_name }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Subscribers <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="subscribers" id=""
                                            placeholder="Enter Subscribers" value="{{ @$profile->subscribers }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Views <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="views" id=""
                                            placeholder="Enter Views" value="{{ @$profile->views }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Profile Logo <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                                <input type="file" name="profile_logo">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="" class="m-2 fw-bold">48hrs Graph Data <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <textarea class="form-control" name="graph_data" id=""
                                            placeholder="Enter Graph Data"
                                            required>{{ @$profile->graph_data }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <button type="submit" id="submit" class="text-light btn btn-success mx-auto btn-icon-text">
                                <i class="fa fa-arrow-circle-right fa-lg"></i>
                                &nbsp;
                                @if (isset($profile))
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
