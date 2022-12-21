@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="p-4 font-weight-bold text-secondary">Create Post</h2>
        </div>
        <hr class="light">

        @include('inc.messages')
        
        <div class="row justify-content-center">
            {!!Form::open(['action'=>'PostsController@store', 'method'=>'POST','enctype'=>'multipart/formdata','files'=>'true'])!!}
                <div class="form-group-row ">
                    <div class="row justify-content-center text-secondary font-weight-bold p-3 h4">
                        {{Form::label('title','Title')}}
                    </div>
                     {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
                </div>

                <div class="form-group-row ">
                    <div class="row justify-content-center text-secondary font-weight-bold p-3 h4">
                        {{Form::label('category','Community')}}
                    </div>
                     {{Form::select('category',$cat,$selectedID,['class'=>'form-control'])}}
                </div>

                <div class="form-group-row">
                    <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                     {{Form::label('body','Body')}}
                    </div>
                     {{Form::textarea('body','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
                </div>

                <div class="form-group-row">
                    <br>
                    <span class="px-4"> Select a Post Image (Optional)</span>
                    <br>
                    {{Form::file('post_image')}}
                </div>

                <div class="row justify-content-center text-secondary font-weight-bold p-3 h4">
                    {{Form::hidden('user_id')}}
                    <br>
                    {{Form::submit('Submit',['class'=>'btn btn-outline-success font-weight-bold mb-5', 'style'=>'width: 30%; box-shadow: 2px 2px 2px #2E8B57'])}}
                </div>
            {!!Form::close()!!}
        </div>
    </div>
@endsection