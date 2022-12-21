@extends('layouts.app')

@section('content')
    <style>
        #Title{
            font-weight:bold; 
            font-family: 'Gill Sans' 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
<div class="container">

    <h3 id="Title" class="text-center text-center font-weight-bold p-4">
        Strathmore Communities 
    </h3>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin-bottom: 100px;">
                <div class="card-header" 
                        style="text-align: center; font-weight:bold; font-size:18px; background-color: #d5d5d5">
                    {{ __('Reset Password') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror p-3" placeholder="Enter Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-outline-success p-2" style="width: 90%; box-shadow: 2px 2px 2px #2E8B57">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
