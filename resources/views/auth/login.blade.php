{{-- @extends('layouts.app') --}}

@extends('layouts.front-layout')

@section('page-title', 'Register')

@section('content')

    {{-- <div id="content" class="pb30">



    </div> --}}






    <div id="content" class="pb30">

        <div id="search-page" class="mb20">
            <div class="container">

            </div>
            <div class="clearfix"></div>
        </div>


        <div class="container">
            <div class="row g-0 justify-content-center">
                <div class="col-sm-4 col-xl-4 col-md-offset-4">
                    <form class="js-validation-login" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb10 ">
                            <div class="form-check">
                                <a class="text-muted fs-sm fw-medium d-block d-lg-inline-block"
                                href="{{ route('register') }}">
                                <b>Dont have an account? Register</b>
                            </a>
                            </div>
                        </div>
                        <div class="mb10">
                            <input type="email"
                                class="form-control form-control-lg form-control-alt py-3 @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autocomplete="email" autofocus id="login-username"
                                name="email" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb10">
                            <input type="password"
                                class="form-control form-control-lg form-control-alt py-3 @error('password') is-invalid @enderror"
                                id="password" name="password" required placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb10 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="login-remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="login-remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb10">
                            <div>
                                @if (Route::has('password.request'))
                                    <a class="text-muted fs-sm fw-medium d-block d-lg-inline-block"
                                        href="{{ route('password.request') }}">
                                        Forgot Password?
                                    </a>
                                @endif


                            </div>
                            <div class="text-center">

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Log In
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>



@endsection
