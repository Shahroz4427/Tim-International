<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> TIM INTERNATIONAL </title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">

    <!-- Themify icons -->
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/icons/themify-icons/themify-icons.css')}}" type="text/css">

    <!-- Main style file -->
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/app.min.css')}}" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style=" background: linear-gradient(135deg, #f0d8a8, #dbb778, #b18a50);" class="auth">

    <!-- begin::preloader-->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- end::preloader -->

    <div class="form-wrapper">
        <div class="container">
            <div class="card card-color">
                <div class="row g-0">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">

                                <div class="d-block text-center logo">
                                    <img src="{{ asset('logo.png') }}" alt="logo" style="width: 180px;">
                                </div>

                                <div class="my-5 text-center text-lg-start">
                                    <h1 class="display-8">Sign In</h1>
                                    <p class="text-muted">Sign in to Admin Panel to continue</p>
                                </div>

                                <form class="mb-5" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input id="email" type="email" placeholder="Enter email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input id="password" type="password" placeholder="Enter password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Optional Remember Me Section (commented out) -->
                                    {{--
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </div>
                        </div>
                        --}}

                        <div class="text-center text-lg-start">
                            <button class="btn btn-primary">Sign In</button>
                        </div>
                        </form>

                    </div> <!-- col-md-10 offset-md-1 -->
                </div> <!-- row -->
            </div> <!-- col -->
        </div> <!-- row g-0 -->
    </div> <!-- card card-color -->
    </div> <!-- container -->
    <!-- form-wrapper -->

    </div>

    <!-- Bundle scripts -->
    <script src="{{ asset('admin_panel/libs/bundle.js')}}"></script>

    <!-- Main Javascript file -->
    <script src="{{ asset('admin_panel/dist/js/app.min.js')}}"></script>

</body>

</html>