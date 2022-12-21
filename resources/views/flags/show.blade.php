@extends('layouts.app')
@section('content')
<style>
    #userName{
        color: #CD853F;
        font-weight: bold;
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
<div class="container-fluid">
    <br>
    <div class="row justify-content-evenly p-4">
        <div class="col-md-4 text-center">
            <h4 class="font-weight-bold">Post Title:</h4>
            <p class="lead" style="font-size: 1.1rem">{{$post->title}}</p>
        </div>
        <div class="col-md-4 text-center">
            <h4 class="font-weight-bold">Post Creator:</h4>
            <p class="lead" style="font-size: 1.1rem">
                <a id="userName" href="/users/{{$post->user->id}}" class="btn btn-lg btn-link">{{$post->user->username}}</a>
            </p>
        </div>
        <div class="col-md-4 text-center">
            <h4 class="font-weight-bold">Date of Post Creation:</h4>
            <p class="lead" style="font-size: 1.1rem">{{$post->created_at->diffForHumans()}}</p>
        </div>
    </div>
    {{-- <div class="row ">
        <div class="col">
        <h5>Event Location:</h5>
        <br>
        <p>{{$flag->location}}</p>
        </div>
        <div class="col">
        <h5>Event Creator:</h5>
        <br>
        <p>{{$flag->user->username}}</p>
        </div>
        <div class="col">
        <h5>Action:</h5>
        <br>
            {!!Form::open(['action'=>['EventUserController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                {{Form::hidden('user_id',Auth::user()->id)}}
                {{Form::hidden('event_id',$event->id)}}
                {{Form::submit('Join Event',['class'=>'btn btn-outline-success'])}}
            {!!Form::close()!!}
        </div>
    </div> --}}
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-striped  table-hover table-responsive text-center" style="width: 50%; margin: auto;">
                <thead>
                    <tr class="p-2">
                        <th class="p-3" style="font-size: 1.1rem">Flagged By</th>
                        <th class="p-3" style="font-size: 1.1rem">Flagged For</th>
                        <th class="p-3" style="font-size: 1.1rem">Context for Flagging</th>
                        <th class="p-3" style="font-size: 1.1rem">Created</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($post->flags as $item)
                    <tr class="p-2">
                        <td class="p-3" style="font-size: 1.03rem">{{$item->user->username}}</td>
                        <td class="p-3" style="font-size: 1.03rem">{{$item->flag_for}}</td>
                        <td class="p-3" style="font-size: 1.03rem"><?php echo $item->extra;?></td>
                        <td class="p-3" style="font-size: 1.03rem"><span class="type-2">{{$item->created_at->diffForHumans()}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection