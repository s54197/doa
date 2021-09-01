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
    
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
    
                                    <div class="form-group row mb-0">
                                        <div class="col-12">
                                            <label for="emailaddress">Emel:</label>
                                            <input class="form-control" type="email" name="email" id="email" placeholder="Sila Masukkan Emel" autofocus autocomplete="email">
                                        </div>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
    
                                    <div class="form-group row mb-0 mt-2">
                                        <div class="col-12">
                                            <a href="{{ route('password.request') }}" class="text-muted float-right"><small>Lupa Kata Laluan?</small></a>
                                            <label for="password">Kata Laluan:</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Sila Masukkan Kata Laluan" aria-label="Kata Laluan" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-light waves-effect waves-light" type="button" id="show_password"><i class="far fa-eye"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
    
                                    <div class="form-group row mt-3">
                                        <div class="col-12">
    
                                            <div class="checkbox checkbox-primary">
                                                <input name="remember" id="remember" type="checkbox" checked="">
                                                <label for="remember">
                                                    Ingat Saya
                                                </label>
                                            </div>
    
                                        </div>
                                    </div>
    
                                    <div class="form-group row text-center">
                                        <div class="col-12">
                                            <button class="btn btn-block btn-primary waves-effect waves-light" type="submit">Log Masuk <i id="loading_icon" class="ml-1 mdi mdi-spin mdi-loading" style="display: none"></i></button>
                                        </div>
                                    </div>
    
                                </form>
    
                                <div class="row mt-4">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted">Belum Ada Akaun?<a href="{{ route('register') }}" class="text-dark ml-1"><b>Daftar Akaun Anda</b></a></p>
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

        <script>
            $(document).ready(function(){
                // display and undisplay password
                $('#show_password').on('click', function(){
                    $("i", this).toggleClass('fa-eye-slash');
                    if ($("#password").attr("type") === "password") $("#password").attr('type', 'text');
                    else $("#password").attr('type', 'password');
                });
                
                // show spinner before submitting form
                $("button[type='submit']").on("click", function(){
                    $('#loading_icon').show();
                });
            });
        </script>
        
    </body>
</html>