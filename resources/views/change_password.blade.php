@extends('layouts.app')

@section('title', 'Kata Laluan')

@section('local_css')
<style>
</style>
@endsection

@section('breadcrumbs')
<li>
    <h4 class="page-title-main">Tukar Kata Laluan</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">DOA</a></li>
        {{-- <li class="breadcrumb-item"><a href="#">Pendaftaran</a></li> --}}
        <li class="breadcrumb-item active">Tukar Kata Laluan</li>
    </ol>
</li>
@endsection

@section('contents')

<div class="container-fluid">
    <div class="row justify-content-md-center mt-4">
        <div class="col-sm-6">
            <div class="card-box">
                <h4 class="header-title">Tukar Kata Laluan</h4>
                <p class="sub-header mb-4">
                    Masukkan kata laluan lama dan kata laluan baru sebelum menekan butang tukar
                </p>

                @if( Session::has( 'success' ))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ Session::get( 'success' ) }}
                </div>
                @elseif( Session::has( 'warning' ))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ Session::get( 'warning' ) }}
                </div>
                @endif

                <form method="POST" class="form-horizontal" role="form" action="{{ route('change.password') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="old_password"><span class="text-danger">*</span>Kata Laluan Lama:</label>
                        <div class="col-md-8">
                            <input type="text" id="old_password" name="old_password" class="form-control" placeholder="Kata Laluan Lama" value="{{ old('old_password') }}">
                            @error('old_password') 
                            <small class='text-danger'>{{ $message }}</small> 
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="new_password"><span class="text-danger">*</span>Kata Laluan Baru:</label>
                        <div class="col-md-8">
                            <input type="text" id="new_password" name="new_password" class="form-control" placeholder="Kata Laluan Baru" value="{{ old('new_password') }}">
                            @error('new_password') 
                            <small class='text-danger'>{{ $message }}</small> 
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="new_password_confirmation"><span class="text-danger">*</span>Kata Laluan Baru (pengesahan):</label>
                        <div class="col-md-8">
                            <input type="text" id="new_password_confirmation" name="new_password_confirmation" class="form-control" placeholder="Kata Laluan Baru (pengesahan)" value="{{ old('new_password_confirmation') }}">
                            @error('new_password_confirmation') 
                            <small class='text-danger'>{{ $message }}</small> 
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-3 mb-0">
                        <div class="col-8 offset-4">
                            <button type="submit" name="change_password_submit" id="change_password_submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Tukar
                            </button>
                            <button type="reset" name="change_password_cancel" id="change_password_cancel" class="btn btn-light waves-effect">
                                Kosongkan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection