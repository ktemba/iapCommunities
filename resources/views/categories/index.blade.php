@extends('layouts.app')
@section('content')
<style>
    a{
        color: #A0522D;
        text-decoration: none;
    }
    a:hover{
        color: #D2B48C;
        text-decoration: none;
    }
</style>

@include('inc.messages')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1 class="pt-4 pb-3 font-weight-bold">Communities</h1>
        </div>
        <hr class="light">

        @foreach ($cat as $item)
            <div class="row">
                <div class="col-md-4 order-1 mx-5 text-center p-3">
                    <a href="/categories/{{$item->id}}">
                        <h4 class="font-weight-bold">{{$item->category_name}}</h4>
                    </a>
                </div>
                
                <div class="col-md-6 order-2 mx-3 text-center p-3">
                    <h5 class="text-center font-weight-bold">About This Community</h5>
                    <p class="text-center" style="font-size: 1.025rem">{{$item->about}}</p>
                </div> 
            </div>
            <br>
        @endforeach
        
    </div>
@endsection