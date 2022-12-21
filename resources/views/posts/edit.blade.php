@extends('layouts.app')
@section('content')
@include('inc.messages')
   <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="p-4 font-weight-bold">Edit Post</h2>
        </div>

       <div class="row justify-content-center">
            {!!Form::open(['action'=>['PostsController@update',$posts->id], 'enctype'=>"multipart/form-data", 'method'=>'POST','onsubmit'=>"return confirm('Are you sure you would like to Edit This Post?');"])!!}
            <div class="form-group-row ">
                <div class="row justify-content-center font-weight-bold" style="font-size: 1.1rem">
                    {{Form::label('title','Title')}}
                </div>
                {{Form::text('title',$posts->title,['class'=>'form-control p-4 m-3 ','placeholder'=>'Title', 'style'=>'font-size: 1.02rem;'])}}
            </div>

            <div class="form-group-row ">
                <div class="row justify-content-center font-weight-bold" style="font-size: 1.1rem">
                    {{Form::label('category','Community')}}
                </div>
                    {{Form::select('category',$cat,$selectedID,['class'=>'form-control p-4 m-3', 'style'=>'font-size: 1.02rem;'])}}
            </div>

            <div class="form-group-row">
                <div class="row justify-content-center font-weight-bold" style="font-size: 1.1rem">
                    {{Form::label('body','Body')}}
                </div>
                    {{Form::textarea('body',$posts->body,['class'=>'ckeditor form-control p-4 m-3','placeholder'=>'Body', 'style'=>'font-size: 1.02rem;'])}}
            </div>

            <div class="form-group-row">
                <br>
                <span class="px-4"> Select a Post Image (Optional)</span>
                <br>
                {{Form::file('post_image')}}
            </div>

            <div class="row justify-content-center">
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save This Edit',['class'=>'btn btn-outline-success font-weight-bold m-4 p-2','style'=>'width: 35%; box-shadow: 2px 2px 2px #2E8B57' ])}}
            </div>
            
            {!!Form::close()!!}  
       </div>
    </div> 
@endsection