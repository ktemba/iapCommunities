@extends('layouts.app')

@section('content')
<head>
    <style>
        main{
            background-image: url('/images/verify_pattern.png');
        }
        #Title{
            padding-top: 7%;
            font-weight:bold; 
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: #2F4F4F;
        }
        #cardHead{
            text-align: center; 
            font-weight:bold; 
            font-size:18px; 
            background-color: #d5d5d5;
        }
    </style>
</head>
<div class="container">

    <h3 class="text-center" id="Title">
        Strathmore Communities 
    </h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-5" >
                <div class="card-header" id="cardHead">
                        {{ __('Verify Your Email Address') }}
                </div>

                <div class="card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
