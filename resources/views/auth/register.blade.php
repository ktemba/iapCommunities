@extends('layouts.app')

@section('content')

<head>
    <style>
        #Title{
            font-weight:bold; 
            font-family: 'Gill Sans' 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        #cardHead{
            text-align: center;
            font-weight:bold;
            font-size:18px;
            background-color: #d5d5d5
        }
        #subLink{
        color: #CD853F;
        font-weight: bold;
        }
        #subLink:hover{
            text-decoration: none;
            color: #D2B48C;
        }
        #subLink:active{
            color: #00FF7F;
            text-shadow: 0.5px 0.5px 0.5px black;
        }
        /* Remove Arrows in number input type */
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
</head>

<div class="container">

    <h3 id="Title" class="text-center font-weight-bold p-4">
        Strathmore Communities 
    </h3>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card mb-5" style="background-image: url({{ asset('images/patterns/wall4.png') }}); border: none;">
                <div class="card-header" id="cardHead">
                    {{ __('Register') }}
                </div>

                @include('inc.messages')
                {{-- <div style="background-image: url('/images/shattered.png');">@include('inc.messages')</div> --}}
                    
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <p style="text-align: center; font-size: 1.02rem"> Already have an account? <a id="subLink" href="{{ route('login') }}">Login</a> Here</p>
                                <br>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="admission_number" type="number" class="form-control @error('adm_no') is-invalid @enderror" name="adm_no" value="{{ old('adm_no') }}" placeholder="Enter Admission Number">
                                @error('adm_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter Username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                            </div>
                        </div>
                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success" style="width: 60%; box-shadow: 2px 2px 2px #2E8B57">
                                    {{ __('Register') }}
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
