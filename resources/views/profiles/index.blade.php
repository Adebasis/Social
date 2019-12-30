@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

          <div class="col-3 p-5">
            <img src="/logo/logo.jpg" style="max-height:100px;" class="rounded-circle">
          </div>
          <div class="col-9">

            <div class="d-flex justify-content-between align-items-baseline pt-5">

                <h1>{{$user->username}}</h1>

                <a href="/post/create">Add New Post</a>
            </div>
            <div>
            
                 <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            </div>
              <div class="d-flex">  
                <div class="pr-3">{{$user->posts->count()}} <span>  Post</span></div>
                <div class="pr-3">12  <span>  Following</span></div>
                <div class="pr-3">100 <span>  Followers</span></div>
             </div>

             <div class="pt-4"><strong>{{$user->profile->title}}</strong></div>

             <div class="pt-4">
                 
                 <p>{{$user->profile->description}}</p>
                
             </div>
             <div> <a href="#">{{$user->profile->url ?? "N/A"}}</a></div>

          </div>
    </div>

    <!-- Image Row-->

    <div class="row pt-5">

     @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{$post->id}}">
            <img src="/storage/{{$post->image}}"  style="width: 250px">
        </a>
        </div>

      @endforeach  

    </div>
</div>
@endsection
