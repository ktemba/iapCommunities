@extends('layouts.app')
@section('content')
<style>
    #userName{
        color: #CD853F;
    }
    #userName:hover{
        text-decoration: none;
        color: #D2B48C;
    }
    #userName:active{
        color: #00FF7F;
        text-shadow: 0.5px 0.5px 0.5px black;
    }
</style>
    <div class="container p-4" >
        @include('inc.messages')
        <div class="row justify-content-center">
            <div class="col-md-11 card text-center m-3">
                @if(count($posts->flags)>0)
                    <div class="row justify-content-start">
                        <div class="alert alert-danger" style="width: 100%" role="alert">
                            This post has {{$posts->flags->count()}} {{Str::plural('count',$posts->flags->count())}} of flags that have been created.
                            <br>
                            <a href="/flags/{{$posts->id}}" class="btn btn-link">Click on this to see a report of flags</a>
                        </div>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="p-4">
                        <h1 class="font-weight-bold">
                            {{$posts->title}} 
                        </h1>
                    </div>
                </div>
                <div class="row justify-content-center p-1">
                    <div class="col-5 text-center">
                        <h5 class="font-weight-bold">By <a id="userName" href="/users/{{$posts->user_id}}">{{$posts->user->username}}</a></h5>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle font-weight-bold mt-4 mb-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Time Stamps
                        </button>
                        
                        <div class="dropdown-menu">                                   
                            <ul style="list-style: circle">
                                <span class="font-weight-bold" style="font-size: 1.02rem">Created:</span>
                                <li class="m-2" style="font-size: 1.01rem">
                                    {{$posts->created_at->diffForHumans()}}
                                </li>

                                <span class="font-weight-bold" style="font-size: 1.02rem">Updated:</span>
                                @if ($posts->updated_at == null)
                                    <li class="m-2" style="font-size: 1.01rem">
                                        This post had not been updated
                                    </li>
                                @else
                                    <li class="m-2" style="font-size: 1.01rem">
                                        {{$posts->updated_at->diffForHumans()}}
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    {{-- <summary>Time Stamps:</summary>
                    <summary>Created:</summary>

                    {{$posts->created_at->diffForHumans()}}
                    <summary>Updated:</summary>
                    @if ($posts->updated_at == null)
                        <span class="p-2">This post had not been updated.</span>
                    @else
                        {{$posts->updated_at->diffForHumans()}}
                    @endif --}}
                    {{-- </details> --}}
                    
                    {{-- <span class="p-2">
                        {{$posts->created_at->diffForHumans()}}
                    </span>   --}}
                </div>
                @if ($posts->post_image)
                <div class="row justify-content-center p-3">
                    <img src="/storage/cover_images/{{$posts->post_image}}" class="img-fluid" alt="Responsive Image" style="width: 30%; box-shadow: 8px 8px 5px #ccc;
                    -moz-border-radius:25px;
                    -webkit-border-radius:25px;">
                </div>
                @else
                    
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-7" >
                        <p class="text-justify p-3" style="font-size: 1.1rem"><?php echo $posts->body?></p>
                    </div>
                </div>
                
                @auth
                <div class="row p-4 mb-2">
                   <div class="col order-1" style="margin-left: 0.8rem">
                        {!!Form::open(['action'=>['LikesController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                            {{Form::hidden('user_id',Auth::user()->id)}}
                            {{Form::hidden('posts_id',$posts->id)}}
                            {{Form::submit('Upvote',['class'=>'btn btn-outline-success font-weight-bold', 'style'=>'box-shadow: 2px 2px 2px #2E8B57'])}}
                        {!!Form::close()!!}

                        <span class="p-2 font-weight-bold text-success">
                            {{$posts->likes->count()}} {{Str::plural('Upvote',$posts->likes->count())}}
                        </span>

                   </div>
                   <div class="col order-2">
                        {!!Form::open(['action'=>['LikesController@destroy',$posts->id],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Downvote',['class'=>'btn btn-outline-danger font-weight-bold', 'style'=>'box-shadow:  2px 2px 2px #CD5C5C'])}}
                        {!!Form::close()!!}
                   </div>
                   <div class="justify-content-end m-1">
                        
                   </div>
                </div>
                <div class="row justify-content-center">
                </div>
                @endauth
                @auth
                    @if (Auth::user()->id==$posts->user_id)
                    <div class="card-footer text-muted text-right">
                        <div class="row justify-content-end p-3">            
                                <div class=" m-1">
                                    <a href="/posts/{{$posts->id}}/edit" class="btn btn-outline-primary font-weight-bold" style="box-shadow:  2px 2px 2px #B0E0E6" >Edit Post</a>
                                </div>

                                <div class="justify-content-end m-1">
                                        {!!Form::open(['action'=>['PostsController@destroy',$posts->id],'method'=>'POST','class'=>'pull-right',
                                        'onsubmit'=>"return confirm('Are you sure you want to Delete This Post?');"])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete Post',['class'=>'btn btn-outline-danger font-weight-bold', 'style'=>'box-shadow:  2px 2px 2px #CD5C5C'])}}
                                        {!!Form::close()!!}
                                </div>
                        </div>
                    </div>
                    @else
                    @endif
                @endauth
            </div>
                @auth
                    <div class="col-md-11 card text-center">
                        @if (Auth::user()->id!=$posts->user_id)
                            <div class="row justify-content-center">
                                <button class="font-weight-bold btn btn-outline-danger mt-3" onclick="Openform();" style="width: 25%; box-shadow:  2px 2px 2px #CD5C5C">Flag Post</button>
                            </div>
                            <br>
                            <div id="form1" style = "display:none">
                                <div class="row justify-content-center">
                                    <br>
                                    {!!Form::open(['action'=>['FlagsController@store'], 'method'=>'POST',
                                    'onsubmit'=>"return confirm('Do you really want to submit the form?');"])!!}
                                        <div class="form-group-row ">
                                            <div class="row justify-content-center font-weight-bold p-2 h4">
                                                {{Form::label('flag_for','Flag For')}}
                                            </div>
                                            <div class="row justify-content-center p-2" style="font-size: 1.02rem">
                                                {{Form::select('flag_for',[
                                                'Misleading'=>'Misleading',
                                                'Sexual Content'=>'Sexual Content',
                                                'Violent, Abusive or Hateful Content'=>'Violent, Abusive or Hateful Content',
                                                'Harmful or Dangerous Acts'=>'Harmful or Dangerous Acts',
                                                'Barassment or Bullying'=>'Harassment or Bullying'
                                                ], 'Misleading',['class'=>'form-control'])}}
                                            </div>
                                        </div>
                                        <div class="form-group-row p-2">
                                            <div class="row justify-content-center p-3 font-weight-bold h4">
                                            {{Form::label('extra','Please provide more infromation for your complaint.')}}
                                            </div>
                                            {{Form::textarea('extra','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
                                        </div>
                                        <div class="row justify-content-center text-secondary font-weight-bold p-3 h4">
                                            {{Form::hidden('post_title',$posts->title)}}
                                            {{Form::hidden('user_id',Auth::user()->id)}}
                                            {{Form::hidden('post_id',$posts->id)}}
                                            <br>
                                            {{Form::submit('Submit',['class'=>'btn btn-outline-success mb-5 font-weight-bold', 'style'=>'width: 30%; box-shadow: 2px 2px 2px #2E8B57'])}}
                                        </div>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        @else
                        <h4 class="text-center font-weight-bold p-4"> Post Events </h4>
                        <div class="row justify-content-center p-4">
                            <div class="col-md-10" >
                                @if (count($posts->events)!=0)
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="p-3">Event Title</th>
                                                <th class="p-3">About</th>
                                                <th class="p-3">Location</th>
                                                <th class="p-3">Date</th>
                                                <th class="p-3">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts->events as $item)
                                            <tr>
                                                <td class="p-3" style="font-size: 1.02rem">{{$item->event_title}}</td>
                                                <td class="p-3" style="font-size: 1.02rem"><?php echo $item->about;?></td>
                                                <td class="p-3" style="font-size: 1.02rem">{{$item->location}}</td>
                                                <td class="p-3" style="font-size: 1.02rem">{{$item->deadline}}</td>
                                                <td class="p-3" style="font-size: 1.02rem">
                                                    <a href="/events/{{$item->id}}" id="userName" class="btn-link font-weight-bold">
                                                        View Event
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h3>There are no events for this post</h3>
                                @endif
                            </div>
                        </div>
                            <div class="row justify-content-center p-4">
                            <button class="btn btn-outline-success font-weight-bold p-2" style="box-shadow: 2px 2px 2px #2E8B57" onclick="Openform1();" style="width: 30%">Add Event</button>
                            <br>
                            </div>
                            <div id="form2" style = "display:none">
                                <div class="row justify-content-center">
                                    <br>
                                    {!!Form::open(['action'=>['EventsController@store'], 'method'=>'POST',
                                    'onsubmit'=>"return confirm('Confirm Event Creation?');"])!!}
                                        <div class="form-group-row">
                                            <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                                            {{Form::label('event_title','Event Location:')}}
                                            </div>
                                            {{Form::text('event_title','',['class'=>'form-control','placeholder'=>'Title'])}}
                                        </div>
                                        <div class="form-group-row" >
                                            <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                                            {{Form::label('deadline','Event Date:')}}
                                            </div>
                                            {{ Form::date('deadline', new \DateTime(), ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group-row">
                                            <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                                            {{Form::label('location','Event Location:')}}
                                            </div>
                                            {{Form::text('location','',['class'=>'form-control','placeholder'=>'Location'])}}
                                        </div>
                                        <div class="form-group-row">
                                            <div class="row justify-content-center text-secondary p-3 font-weight-bold h4">
                                            {{Form::label('about','About The Event')}}
                                            </div>
                                            {{Form::textarea('about','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
                                        </div>
                                        <div class="row justify-content-center text-secondary font-weight-bold p-3 h4">
                                            {{Form::hidden('user_id',Auth::user()->id)}}
                                            {{Form::hidden('post_id',$posts->id)}}
                                            <br>
                                            {{Form::submit('Submit',['class'=>'btn btn-outline-success mb-5 font-weight-bold', 'style'=>'width: 30%; box-shadow: 2px 2px 2px #2E8B57'])}}
                                        </div>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        @endif
                </div>
            @endauth
        </div>

        <div class="row justify-content-center p-4">
            <div class="col-md-11 card m-3">
                <div class="row justify-content-center">
                    <div class="p-4">
                        <h2 class="font-weight-bold">
                            Comments
                        </h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="row justify-content-center">
                            <div class="p-4">
                                <h2 class="font-weight-bold">
                                    Post a Comment
                                </h2>
                            </div>
                        </div>

                        <div class="form-group">
                            @auth
                            {!! Form::open(['action'=>['CommentsController@store'],'method'=>'POST','onsubmit'=>"return confirm('Confirm Comment Creation?');"]) !!}
                            <div class="form-group-row ">
                                <div class="row justify-content-center">
                                    {{Form::textarea('body','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
                                </div>
                            </div>

                            {{Form::hidden('user_id',Auth::user()->id)}}
                            {{Form::hidden('posts_id',$posts->id)}}

                            <div class="row justify-content-center p-3">
                                {{Form::submit('Submit Comment',['class'=>'btn btn-outline-success font-weight-bold', 'style'=>'width: 20%; box-shadow: 2px 2px 2px #2E8B57'])}}
                            </div>

                            {!!Form::close()!!}
                            @endauth
                        </div> 
                    </div>
                </div>
                <br><br>

                @if (count($comments)>0)
                    @foreach ($comments as $item)
                    <br>

                        <div class="row justify-content-start m-2">
                            <div class="card" style="width: 100%">
                                <div class="card-body" style="height: 75%; font-size: 1.02rem;">
                                    <?php echo $item->comment; ?>
                                    <br>
                                </div>


                                <div class="card-footer text-muted  p-3">

                                    <p>
                                        <span class="font-weight-bold font-italic">By: 
                                            <a id="userName" href="/users/{{$item->user_id}}">
                                                @if(!empty($item->user))
                                                <span class="font-italic font-weight-bold">{{ $item->user->username }}</span>
                                                @endif
                                            </a>
                                        </span>
                                        <br>
                                        <span class="font-italic font-weight-bold">Created: </span>
                                        <span class="font-italic font-weight-bold">{{$item->created_at->diffForHumans()}}</span>
                                    </p>
                                    @auth
                                        <div class="float-left">
                                            <button class="btn btn-outline-success font-weight-bold" style="box-shadow: 2px 2px 2px #2E8B57" data-id="{{$item->id}}" onclick="show({{$item->id}});">Reply</button>
                                        </div>    
                                        <div class="float-right">
                                                @if (Auth::user()->id==$item->user_id)
                                                        {!!Form::open(['action'=>['CommentsController@destroy',$item->id],'method'=>'POST','class'=>'pull-right',
                                                        'onsubmit'=>"return confirm('Confirm Comment Deletion?');"])!!}
                                                            {{Form::hidden('_method','DELETE')}}
                                                            {{Form::submit('Delete Comment',['class'=>'btn btn-outline-danger font-weight-bold', 'style'=>'box-shadow:  2px 2px 2px #CD5C5C'])}}
                                                        {!!Form::close()!!}
                                                @else
                                                    
                                                @endif
                                            
                                        </div>
                                        <div id="reply-{{$item->id}}" class="row justify-content-start" style="display: none">
                                            {!! Form::open(['action'=>['ReplyController@store'],'method'=>'POST','onsubmit'=>"return confirm('Confirm Comment Creation?');"]) !!}
                                                <div class="form-group-row ">
                                                    <div class="row justify-content-center">
                                                        {{Form::textarea('reply','',['class'=>'ckeditor form-control','placeholder'=>'Body'])}}
                                                    </div>
                                                </div>

                                                {{Form::hidden('user_id',Auth::user()->id)}}
                                                {{Form::hidden('comment_id',$item->id)}}


                                    {{-- <div class="float-right">
                                        @auth
                                            @if (Auth::user()->id==$item->user_id)
                                                    {!!Form::open(['action'=>['CommentsController@destroy',$item->id],'method'=>'POST','class'=>'pull-right',
                                                    'onsubmit'=>"return confirm('Confirm Comment Deletion?');"])!!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        {{Form::submit('Delete Comment',['class'=>'btn btn-outline-danger font-weight-bold', 'style'=>'box-shadow:  2px 2px 2px #CD5C5C'])}}
                                                    {!!Form::close()!!}
                                            @else
                                                
                                            @endif
                                        @endauth
                                    </div> --}}

                                                <div class="row justify-content-center p-3">
                                                    {{Form::submit('Submit Reply',['class'=>'btn btn-outline-success font-weight-bold', 'style'=>'width: 20%; box-shadow: 2px 2px 2px #2E8B57'])}}
                                                </div>
                                            {!!Form::close()!!}
                                        </div>
                                        <br><br>
                                        <div class="m-2">
                                            <div class="float-left">
                                                <button class="btn btn-outline-info font-weight-bold mt-2" style="box-shadow:  2px 2px 2px #B0E0E6" data-id="{{$item->id}}" onclick="showR({{$item->id}});">Show replies.</button>
                                            </div>
                                            <br><br>
                                            <div id="Creply-{{$item->id}}" class="row justify-content-start" style="display: none">
                                                @if (count($item->replies)>0)
                                                    @foreach ($item->replies as $item)
                                                        <div class="card m-4">
                                                            <div class="card-body text-dark" style="font-size: 1.02rem;"><?php echo $item->reply; ?></div>
                                                            <div class="card-footer">
                                                                <p>
                                                                    <span class="font-italic font-weight-bold">By: <a id="userName" href="/users/{{$item->id}}">{{$item->user->username}}</a></span><br>
                                                                    <span class="font-italic font-weight-bold">Created: </span>
                                                                    <span class="font-italic font-weight-bold">{{$item->created_at->diffForHumans()}}</span>
                                                                </p>
                                                                <div class="float-right">
                                                                    @if (Auth::user()->id==$item->user_id)
                                                                            {!!Form::open(['action'=>['ReplyController@destroy',$item->id],'method'=>'POST','class'=>'pull-right',
                                                                            'onsubmit'=>"return confirm('Confirm Reply Deletion?');"])!!}
                                                                                {{Form::hidden('_method','DELETE')}}
                                                                                {{Form::submit('Delete Reply',['class'=>'btn btn-outline-danger font-weight-bold', 'style'=>'box-shadow:  2px 2px 2px #CD5C5C'])}}
                                                                            {!!Form::close()!!}
                                                                    @else
                                                                        
                                                                    @endif
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p class="m-3 text-center lead font-weight-bold" style="font-size: 1.02rem">This comment has no replies.</p>
                                                @endif
                                            </div>
                                         </div>
                                    @endauth
                                </div>
                            </div>
                            
                        </div>
                        
                    @endforeach
                @else
                    <h4 class="text-center">
                        There are no comments
                    </h4>
                @endif
            </div>
        </div>
        <br>
    </div>
    <script>
        function Openform()
        {
            var x = document.getElementById("form1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function show(id){
            var $toggle = $(this); 
            var elementTar = "reply-"+id;
            var x = document.getElementById(elementTar);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function showR(id){
            var $toggle = $(this); 
            var elementTar = "Creply-"+id;
            var x = document.getElementById(elementTar);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function Openform1(){
            var x = document.getElementById("form2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        $('#datetimepicker').datetimepicker({
            format: 'yyyy-mm-ddTHH:mm:ss.sssZ'
        });
    </script>
@endsection