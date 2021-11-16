<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $posts =  Post::where('user_id', Auth::user()->id)->get();
        if (Auth::user()->usertype == '') {
           return view('user.home', compact('posts'));
        }
        else{
            return redirect('/post');
        }
        
        
    } 
     public function user()
    {
        $user = User::all();
        
        return view('user/all-user' , compact('user'));
    }  
    public function edituser($id)
    {   
        $user = User::find($id);

        return view('user.edit' , compact('user'));
    }
     
    public function userdestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return view('user/user');
    } 
}

       