@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (count($posts)>0)
                @foreach ($posts as $item)
                <br>
                    <div class="card" style="width: 100%">
                        <div class="card-header">
                            <a href="/posts/{{$item->id}}" class="btn btn-primary">
                                <h5 class="card-title">{{$item->title}}</h5>
                            </a>
                        </div>
                        <div class="card-body">
                            <?php echo $item->body?>
                           
                        </div>
                        <div class="card-footer text-muted">
                            {{$item->created_at->diffForHumans()}}
                            <div style="float: right">
                                <span>{{$item->likes->count()}} {{Str::plural('likes',$item->likes->count())}}</span>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            @else
                <h2>There are no posts</h2>
            @endif
        </div>
       
    </div>
@endsection