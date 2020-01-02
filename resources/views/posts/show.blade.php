@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="row">
        <div class="col-4 pt-10">
            <img src="/storage/{{$post->image}}" >
        </div>
        <div class="col-4">
        	<div>
        		<div class="d-flex align-item-center">
        			<div class="pr-3">
                    <img src="/storage/{{ $post->user->profile->image}}" height="25px" class="rounded-circle">
                </div>
            <div>
            <div class="font-weight-bold">
            	<a href="/profile/{{ $post->user->id }}" class="text-dark">{{$post->user->username}}</a>
            	|
            	<a href="#" class="pl-3">Follow</a>
            </div>
           
           </div>
    </div>

    <hr>

        	<div><strong><a href="/profile/{{ $post->user->id }}" class="text-dark">{{$post->user->username}}</a></strong> {{$post->description}}</div>

    
 </div>
</div>
@endsection
