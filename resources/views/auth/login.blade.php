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
            background-color: #d5d5d5;
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
    </style>
</head>

<div class="container">

    <h3 class="text-center font-weight-bold p-4" id="Title">
        Strathmore Communities 
    </h3>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-3" style="background-image: url({{ asset('images/patterns/wall4.png') }}); border: none;">
                <div class="card-header" id="cardHead">
                    Login
                </div>
                
                @include('inc.messages')
                {{-- <div style="background-image: url('/images/shattered.png');">@include('inc.messages')</div> --}}
                
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">                            
                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror m-1 p-3" placeholder="Enter Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror m-1 p-3" placeholder="Enter Password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2 text-center">
                                <button type="submit" class="btn btn-outline-success m-3 font-weight-bold" style="width: 50%; box-shadow: 2px 2px 2px #2E8B57">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a id="subLink" class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 1.02rem">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <br><br>
                                
                                <p style="text-align: center; font-size: 1.02rem"> New around here? <a id="subLink" href="{{ route('register') }}">Register</a> Here</p>
                                <br>
                                <p style="text-align: center"><a id="subLink" href="/admin/login" class="btn btn-link" style="font-size: 1.02rem">Admin Side</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection