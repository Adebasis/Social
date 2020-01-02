<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{

  public function __construct(){

    $this->middleware('auth');
  }

	public function index(){

        $userId=auth()->user()->id;
        $user=auth()->user();

        // Returning Whether the logged in user following 
        $follows=(auth()->user()) ?  auth()->user()->following->contains($user->id) :false;
        
		    return view('profiles.index',compact('user','follows'));
	}


    public function show($user){

    
       $user=User::findOrFail($user);

       

       return view('profiles.index',compact('user'));


    }
	public function edit(User $user){
 
     $this->authorize('update',$user->profile);  // Authorizing Policy
		 return view('profiles.edit',compact('user'));
	}

	public function update(User $user){

      $this->authorize('update',$user->profile);  // Authorizing Policy

       $data=request()->validate([
 
       'title'=>['required','string','max:255'],
       'description'=>['required','string',"max:1000"],
       'url'=>['required','url'],
       'image'=>'',
       ]);

       

       if(request('image')){


          // To upload and store image file in upload folder under stoarge directory
         $imagePath=request('image')->store('uploads','public');

         // Resiging the Image by using Intervention Image Package
         
         $image=Image::make(public_path('storage/'.$imagePath))->fit(300,300);
         $image->save();

         $imageArray=['image'=>$imagePath];

       }

       
       auth()->user()->profile->update(array_merge(
        $data,
        $imageArray ?? []
        
       ));

       
        // Returning Whether the logged in user following
        $follows=(auth()->user()) ?  auth()->user()->following->contains($user->id) :false;
        
        return view('profiles.index',compact('user','follows'));


	}
   
}
