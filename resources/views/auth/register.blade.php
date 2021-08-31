<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>DOA - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" /> --}}
        {{-- <meta content="Coderthemes" name="author" /> --}}
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-pages">

            <!-- Begin page -->
            <div class="accountbg" style="background: url('assets/images/agriculture-background-login-4k.jpg');background-size: cover;background-position: center;"></div>
    
            <div class="wrapper-page account-page-full">
    
                <div class="card shadow-none">
                    <div class="card-block">
    
                        <div class="account-box">
    
                            <div class="card-box shadow-none p-4 mt-2">
                                {{-- <h2 class="text-uppercase text-center pb-3">
                                    <a href="index.html" class="text-primary">
                                        <span><img src="assets/images/logo-dark.png" alt="" height="26"></span>
                                    </a>
                                </h2> --}}
                                {{-- <div class="text-center mb-2 mt-4"> --}}
                                <div class="text-center mb-0">
                                    <img src="assets/images/logo-jabatan-light.jpg" alt="logo_jabatan_pertanian" height="200">
                                </div>

                                <h3 class="text-center mt-0 mb-4">Sistem Rekod Maklumat Pendaftaran</h3>
    
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
    
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="emailaddress">Nama Penuh:</label>
                                            <input class="form-control" type="text" name="name" id="name" required placeholder="Nama Penuh" autofocus autocomplete="email" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="emailaddress">Emel:</label>
                                            <input class="form-control" type="email" name="email" id="email" required placeholder="Emel" autofocus autocomplete="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
    
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="password">Kata Laluan:</label>
                                            <input class="form-control mb-1" type="password" name="password" required id="password" placeholder="Kata Laluan" autocomplete="new-password">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="password">Pengesahan Kata Laluan:</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required 
                                            placeholder="Kata Laluan"
                                            autocomplete="new-password">
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="form-group row text-center">
                                        <div class="col-12">
                                            <button class="btn btn-block btn-primary waves-effect waves-light" type="submit">Daftar Baru</button>
                                        </div>
                                    </div>
    
                                </form>

                                <div class="row mt-4">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted">Sudah Ada Akaun?<a href="{{ route('login') }}" class="text-dark ml-1"><b>Terus Log Masuk</b></a></p>
                                    </div>
                                </div>
    
                            </div>
                        </div>
    
                    </div>
                </div>
    
                <div class="text-center">
                    <p class="account-copyright">2019 - 2021 © DOA Web Application 
                        {{-- <span class="d-none d-sm-inline-block"> - Coderthemes.com</span> --}}
                    </p>
                </div>
    
            </div>
    
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>