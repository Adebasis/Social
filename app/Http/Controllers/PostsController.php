<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    
    public function __construct(){

    	$this->middleware('auth');
    }



    public function create(){

    	return view('posts.create');
    }



    public function store(){

          $data=request()->validate([
          'description'=>'required',
          'image'=>['required','image'],

         ]);

         // To upload and store image file in upload folder under stoarge directory
         $imagePath=request('image')->store('uploads','public');

         // Resiging the Image by using Intervention Image Package
         //dd(public_path('storage/'.$imagePath));
         $image=Image::make(public_path('storage/'.$imagePath))->fit(300,300);
         $image->save();

         auth()->user()->posts()->create([

          'description'=>$data['description'],
          'image'=>$imagePath
         ]);

         return redirect('/profile/'.auth()->user()->id);

    }


    public function show(Post $post){

      
      return view('posts.show',compact('post'));

    }
}
