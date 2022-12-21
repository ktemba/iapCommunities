@extends('layouts.app')
@section('name')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h2 class="p-4 font-weight-bold text-secondary">Create Post</h2>
    </div>
    <hr class="light">

    @include('inc.messages')
    
    <div class="row justify-content-center">
        {!!Form::open(['action'=>'PostsController@store', 'method'=>'POST','enctype'=>'multipart/formdata','files'=>'true'])!!}
            <div class="form-group-row">
                <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                 {{Form::label('reply','Reply')}}
                </div>
                 {{Form::textarea('reply','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
            </div>
            <div class="row justify-content-center text-secondary font-weight-bold p-3 h4">
                {{Form::hidden('user_id')}}
                <br>
                {{Form::submit('Submit',['class'=>'btn btn-outline-success mb-5', 'style'=>'width: 30%;'])}}
            </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection