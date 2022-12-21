@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h2 class="text-center p-4 font-weight-bold">{{$event->user->username}}'s Event</h2>
        
        <div class="card mx-4">
            <div class="card-header">
                <div class="text-center p-2">
                    <span class="h5 p-2 font-weight-bold">About "{{$event->event_title}}" Event</span>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <p class="lead" style="font-size: 1.02rem"><?php echo $event->about;?></p>
                </div>
            </div>
            <div class="card-footer">
                <span>
                    <div id="first" class="text-right" style="float: left; margin: 0; padding: 0;">
                        <p class="font-weight-bold font-italic p-3">Event Date:</p> 
                        <p class="font-weight-bold font-italic p-3">Event Location:</p>
                        <p class="font-weight-bold font-italic p-3">Event Creator:</p>
                    </div>
                    <div class="text-left" style="margin: 0; padding: 0">
                        <p class="font-weight-bold font-italic p-3">{{$event->deadline}}</p>                
                        <p class="font-weight-bold font-italic p-3">{{$event->location}}</p>                 
                        <p class="font-weight-bold font-italic p-3">{{$event->user->username}}</p> 
                    </div>
                </span>

                <div class="text-center">
                    {!!Form::open(['action'=>['EventUserController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                            {{Form::hidden('user_id',Auth::user()->id)}}
                            {{Form::hidden('event_id',$event->id)}}
                            {{Form::submit('Join Event',['class'=>'btn btn-outline-success font-weight-bold', 'style'=>'width:20%; padding: 0.4rem; box-shadow:  2px 2px 2px #2E8B57'])}}
                    {!!Form::close()!!}
                </div>

            </div>
        </div>
        {{-- <div class="row p-4">
            <div class="col">
                
                
            </div>
            <div class="col">
            <h5>About Event:</h5>
            <br>
           
            </div>
            <div class="col">
            <h5>Event Date:</h5>
            <br>
            <p>{{$event->deadline}}</p>
            </div>
        </div>
        <div class="row ">
            <div class="col">
            <h5>Event Location:</h5>
            <br>
            <p></p>
            </div>
            <div class="col">
            <h5>Event Creator:</h5>
            <br>
            <p>{{$event->user->username}}</p>
            </div>
            <div class="col">
                <h5>Action:</h5>
                <br>
                    {!!Form::open(['action'=>['EventUserController@store'],'method'=>'POST', 'class'=>'','style'=>'display: inline'])!!}
                        {{Form::hidden('user_id',Auth::user()->id)}}
                        {{Form::hidden('event_id',$event->id)}}
                        {{Form::submit('Join Event',['class'=>'btn btn-outline-success'])}}
                    {!!Form::close()!!}
            </div> --}}
            {{-- <div class="col"><br><br>
                    <a href="/pdf/event/{{$event->id}}" class="btn btn-link">Make PDF</a>
            </div> --}}
        {{-- </div> --}}
        <h3 class="text-center pt-5 pb-4 font-weight-bold"> Joined this Event </h3>
        
            @if (count($event->users)>0)
            <div class="row justify-content-center">
            <table class="mx-auto w-auto table table-responsive text-center">
                <thead>
                    <tr>
                        <th class="p-3" style="font-size: 1.1rem">Name:</th>
                        <th class="p-3" style="font-size: 1.1rem">Username:</th>
                        <th class="p-3" style="font-size: 1.1rem">Email:</th>
                        <th class="p-3" style="font-size: 1.1rem">Admission Number:</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($event->users as $item)
                    <tr>
                        <td class="p-3" style="font-size: 1.03rem">{{$item->name}}</td>
                        <td class="p-3" style="font-size: 1.03rem">{{$item->username}}</td>
                        <td class="p-3" style="font-size: 1.03rem">{{$item->email}}</td>
                        <td class="p-3" style="font-size: 1.03rem">{{$item->adm_no}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="text-center p-4">
                    <h3 class="font-weight-bold">There are no student in this event</h3>
                </div>
                    
                @endif
            </table>
            
        </div>
    </div>
@endsection