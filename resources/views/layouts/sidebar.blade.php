<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/theme/default/assets/images/favicon.ico') }}">

        <!-- DataTables -->
        <link href="{{ asset('/theme/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/theme/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('/theme/default/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/theme/default/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/theme/default/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/theme/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/theme/default/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" type="text/css"  href="{{ asset('/theme/default/assets/a.css') }}" />

    </head>

    <body>
<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="index.html" class="logo">
            <span>
                <img src="{{ asset('theme/default/assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
            </span>
            <span>
                <img src="{{ asset('theme/default/assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{ asset('theme/default/assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            <li>
                <a href="{{url('/dashboard')}}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
                <!-- <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="index.html"><i class="ti-control-record"></i>Registration</a></li>
                    <li class="nav-item"><a class="nav-link" href="sales-index.html"><i class="ti-control-record"></i>Sales</a></li> 
                </ul> -->
            </li>

            <li>
                <a href="javascript: void(0);"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Transactions</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{url('/transaction-overview')}}"><i class="ti-control-record"></i>Overview</a></li>
                        
                    <li class="nav-item"><a class="nav-link" href="{{url('/transaction-payments-list')}}"><i class="ti-control-record"></i>Payments</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Settlements</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{url('/settlement-overview')}}"><i class="ti-control-record"></i>Overview</a></li>
                        
                    <li class="nav-item"><a class="nav-link" href="{{url('/settlement-payments-list')}}"><i class="ti-control-record"></i>Payments</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Youtube</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{url('/youtube/user-profiles')}}"><i class="ti-control-record"></i>Profile</a></li>
                        
                    <li class="nav-item"><a class="nav-link" href="{{url('/youtube/user-views')}}"><i class="ti-control-record"></i>Views</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{url('/youtube/user-videos')}}"><i class="ti-control-record"></i>Videos</a></li>
                </ul>
            </li>

            <hr class="hr-dashed hr-menu">          
        </ul>
    </div>
</div>
<!-- end left-sidenav-->