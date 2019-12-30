@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="row">
        <div class="col-4 pt-5">
            <img src="/storage/{{$post->image}}" >
        </div>
        <div class="col-1 pt-5">
            <h3>{{$post->user->username}}</h3>
            <p>{{$post->description}}</p>
        </div>
    </div>
</div>
@endsection
