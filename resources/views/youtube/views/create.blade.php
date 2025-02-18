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
                                <h4 class="page-title">User View Create</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Youtube</a></li>
                                    <li class="breadcrumb-item active">User View Create</li>
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
                            <a href="{{ url('youtube/user-views') }}"
                                class="text-light btn btn-primary mx-auto btn-icon-text">
                                User Views List
                            </a>
                        </div>

                        @if (isset($view))
                            <form action="{{ route('youtube.user-views.update', $view->id) }}" method="POST" enctype="multipart/form-data">
                            @else
                                <form action="{{ route('youtube.user-views.store') }}" method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row mx-3 ">

                        </div>
                        <div id="payment-container">
                            <!-- Payment Form Fields - This section will be duplicated -->
                            <div class="payment-row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Views Label <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input name="views_label" type="text" class="form-control"
                                            placeholder="Enter Views Label" value="{{ @$view->views_label }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Views <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="views" id=""
                                            placeholder="Enter Views" value="{{ @$view->views }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Watch Hrs Label <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="watch_hrs_label" id=""
                                            placeholder="Enter Watch Hrs Label" value="{{ @$view->watch_hrs_label }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Watch Hrs <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="watch_hrs" id=""
                                            placeholder="Enter Watch Hrs" value="{{ @$view->watch_hrs }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Subscribers Label <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="subscribers_label" id=""
                                            placeholder="Enter Subscribers Label" value="{{ @$view->subscribers_label }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Subscribers <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="subscribers" id=""
                                            placeholder="Enter Subscribers" value="{{ @$view->subscribers }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">New Data Label <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="new_data_label" id=""
                                            placeholder="Enter New Data Label" value="{{ @$view->new_data_label }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">New Data <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <input type="text" class="form-control" name="new_data" id=""
                                            placeholder="Enter New Data" value="{{ @$view->new_data }}"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="m-2 fw-bold">Duration <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <select id="" name="duration" class="form-control"
                                            style="background-color:white;" required>
                                            <option value="">Select Duration</option>
                                            <option value="1" {{ old('duration', @$view->duration) == '1' ? 'selected' : '' }}>Last 7 days</option>
                                            <option value="2" {{ old('duration', @$view->duration) == '2' ? 'selected' : '' }}>Last 28 days</option>
                                            <option value="3" {{ old('duration', @$view->duration) == '3' ? 'selected' : '' }}>Last 90 days</option>
                                            <option value="4" {{ old('duration', @$view->duration) == '4' ? 'selected' : '' }}>Last 365 days</option>
                                            <option value="5" {{ old('duration', @$view->duration) == '5' ? 'selected' : '' }}>Lifetime</option>
                                            <option value="6" {{ old('duration', @$view->duration) == '6' ? 'selected' : '' }}>2025</option>
                                            <option value="7" {{ old('duration', @$view->duration) == '7' ? 'selected' : '' }}>2024</option>
                                            <option value="8" {{ old('duration', @$view->duration) == '8' ? 'selected' : '' }}>January</option>
                                            <option value="9" {{ old('duration', @$view->duration) == '9' ? 'selected' : '' }}>December 2024</option>
                                            <option value="10" {{ old('duration', @$view->duration) == '10' ? 'selected' : '' }}>November 2024</option>
                                            <option value="11" {{ old('duration', @$view->duration) == '11' ? 'selected' : '' }}>Custom</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="m-2 fw-bold">Graph Data <span
                                                style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                                        <textarea class="form-control" name="graph_data" id=""
                                            placeholder="Enter Graph Data"
                                            required>{{ @$view->graph_data }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <button type="submit" id="submit" class="text-light btn btn-success mx-auto btn-icon-text">
                                <i class="fa fa-arrow-circle-right fa-lg"></i>
                                &nbsp;
                                @if (isset($view))
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
