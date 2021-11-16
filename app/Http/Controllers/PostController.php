<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $post =  Post::all();
       if(Auth::user()->usertype == 'admin')
       {
            return view('post.index', compact('post'));
       }
       else{
            return redirect('/user');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
       
        $post = new Post;
        $post->user_id = Auth::id();
        $post->name = $request->name;
        $post->description = $request->description;
        if ($request->hasfile('file'))
         {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.' .$extension;
            $file->move('uploads/avatars', $filename);
            $post->avatar = $filename;
        }
        $post->save();
        if(Auth::user()->usertype == 'admin'){
        return redirect('/post');
    }
    else{

        return redirect('/user');
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post = Post::find($id);
        return view('post.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->update();
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        if(Auth::user()->usertype == 'admin')
        {
          return redirect('/post');
        }
    else{

        return redirect('/user');
    }
    }


}
