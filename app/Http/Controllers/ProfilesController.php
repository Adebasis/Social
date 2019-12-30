<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{

	public function index(){

        $userId=Auth::user()->id;
        $user=User::findOrFail($userId);
        
		return view('profiles.index',compact('user'));
	}


    public function show($user){


       $user=User::findOrFail($user);

       return view('profiles.index',compact('user'));


    }
	public function edit(User $user){

        
		return view('profiles.edit',compact('user'));
	}

	public function update(User $user){

       $data=request()->validate([
 
       'title'=>['required','string','max:255'],
       'description'=>['required','string',"max:1000"],
       'url'=>['required','url'],
       'image'=>['required','image'],
       ]);

       //dd(request()->all());

       $user->profile->update($data);

       return redirect('profile/{$user}');
	}
   
}
