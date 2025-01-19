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
                                <h4 class="page-title">User Videos List</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dastone</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Youtube</a></li>
                                    <li class="breadcrumb-item active">Videos List</li>
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
                            <a href="{{ url('youtube/user-videos/create') }}" class="text-light btn btn-primary mx-auto btn-icon-text">
                                Add New User Video
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
                                    <th>S. No.</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Average View</th>
                                    <th>Views</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/' . $video->thumbnail) }}" alt="thumbnail" style="width: 60px; height:auto;"></td>
                                        <td>{{ $video->title }}</td>
                                        <td>{{ $video->date }}</td>
                                        <td>{{ $video->average_view }}</td>
                                        <td>{{ $video->views }}</td>
                                        <td>
                                            <a href="{{ route('youtube.user-videos.edit', $video->id) }}"><i class="las la-pen text-secondary font-16"></i></a>
                                            <a href="{{ route('youtube.user-videos.destroy', $video->id) }}"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->
    @endsection
