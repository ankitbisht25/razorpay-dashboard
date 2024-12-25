@extends('layouts.app')

@section('content')

  <div class="container-scroller" style="margin-top: -30px;">
      <div class="logo mx-auto">
        <div class="container text-center d-flex justify-content-center mt-3">
          <div class="col-5 col-md-3">
          </div>
        </div>
      </div>
    <div class="container-fluid py-0">
      <center>
      <div class="col-10 col-sm-8 col-md-4 auth pt-1">
        {{-- <div class="row w-100 mx-0">
          <div class="col-lg-8 mx-auto"> --}}
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="w-100 mb-5">
                <H2 style="font-weight:bold;color:green">RAZORPAY DASHBOARD</H2>
              </div>
              <div class="row">  
                @if (session('alert_status'))
                    <h6 class="alert alert-success">{{ session('alert_status') }}</h6>
                @endif      
                @if ($errors->any())
                    <div class="alert alert-danger">{{$errors->first()}}</div>
                    @endif
            </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-normal">Sign in to continue.</h6>
              <form method="POST" action="{{ route('login') }}" class="pt-3">
                  @csrf
                <div class="form-group">
                 <input id="user_code" type="text" class="form-control form-control-lg @error('user_code') is-invalid @enderror" name="email" value="{{ old('user_code') }}" required autocomplete="user_code" autofocus  placeholder="Username">

                  
                </div>
                <div class="form-group position-relative mt-3">
                  <i class="fa fa-eye show_hide_pass" aria-hidden="true" style="position:absolute; right:10px; top:16px; font-size: 19px; z-index:1000"></i>
                  <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" > {{ __('Login') }}</button>
                </div>
                <div class="my-2 d-flex justify-content-center align-items-center">

                  @if (Route::has('password.request'))
                                    <a class="btn btn-link"class="auth-link text-black"  href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                 
                </div>
                
              </form>
            </div>
          {{-- </div>
        </div> --}}
      </div></center>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 

</html>

@endsection
