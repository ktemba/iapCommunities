@extends('layouts.app')
@section('content')
    <div class="container p-4">
        @include('inc.messages')
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="p-4 text-center font-weight-bold">
                    Edit My Details
                </h2>
                <div class="card" style="background-image: url({{ asset('images/patterns/wall4.png') }}); border: none;">
                    <div class="card-header text-center font-weight-bold">
                        Edit Personal Details
                    </div>
                    <div class="card-body">
                        {!! Form::open(['action'=> ['UsersController@update', $users->id], 'method'=>'POST',
                        'enctype'=>'multipart/formdata','files'=>'true','onsubmit'=>'return confirm("Do you really want to submit the form?");']) !!}
                            <div class="col-md-12 text-center">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-9 p-2">
                                        {{Form::text('username',$users->username,['class'=>'form-control','placeholder'=>'Username'])}}
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class=" col-md-9 p-2">
                                        {{Form::text('name',$users->name,['class'=>'form-control','placeholder'=>'Name'])}}
                                    </div>
                                </div>


                                <div class="form-group row justify-content-center">
                                    <div class="col-md-9 p-2">
                                        {{Form::text('adm_no',$users->adm_no,['class'=>'form-control','placeholder'=>'Admission Number'])}}
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-md-9 p-2">
                                        {{Form::text('email',$users->email,['class'=>'form-control','placeholder'=>'Email'])}}
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-md-9 p-2 text-center">
                                        <span class="lead"> Select a Profile Image:</span>
                                        <span>{{Form::file('user_image')}}</span>
                                    </div>
                                </div>

                                <br>

                                <div class="col-md-8 offset-md-2 text-center">
                                    {{Form::hidden('_method','PUT')}}
                                    {{Form::submit('Save',['class'=>'font-weight-bold btn btn-outline-success mb-5', 'style'=>'width: 50%; box-shadow: 2px 2px 2px #2E8B57'])}}
                                    {!!Form::close()!!}
                                </div>
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection