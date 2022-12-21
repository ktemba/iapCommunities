<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Strathmore Communities</title>

        <!-- Scripts -->
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <div class="row ">
            <div class="col">
            <h5>Event Title:</h5>
            <br>
            <p>{{$event->event_title}}</p>
            </div>
            <div class="col">
            <h5>About Event:</h5>
            <br>
            <p><?php echo $event->about;?></p>
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
            <p>{{$event->location}}</p>
            </div>
            <div class="col">
            <h5>Event Creator:</h5>
            <br>
            <p>{{$event->user->username}}</p>
            </div>
        </div>
        <div class="row">
            @if (count($event->users)>0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name:</th>
                        <th>Username:</th>
                        <th>Email:</th>
                        <th>Admission Number:</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($event->users as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->adm_no}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @else
                <div class="row justify-content-center">
                    <h1>There are no student in this event!</h1>
                </div>
                    
                @endif
            
        </div>
    </div>
</body>
</html>