<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(2);      
        return view('posts.index',compact('posts'))->with('i',(request()->input('page',1) - 1 ) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_name'=>'required',
            'post_detail'=>'required',
        ]);
        $postdata["name"] = $request->input('post_name');
        $postdata["detail"] = $request->input('post_detail');
       
        Post::create($postdata);
        return redirect()->route('posts.index')->with('success',"Post created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post 
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       return view('posts.create',['edit_flag'=>1,'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'post_name'=>'required',
                'post_detail'=>'required',
            ]
        );

        $postdata["name"] = $request['post_name'];
        $postdata["detail"] = $request['post_detail'];
        
        $post->update($postdata);
        return redirect()->route('posts.index')->with("success","Post updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /* For  functionality without ajax 
        $post->delete();
        return redirect()->route("posts.index")->with("success","Post '".$post->name."' deleted successfully. ");

        */
        $post->delete();
        return response($post->name.' post deleted successfully ',200);
    }

    public function save_post1(Request $request)
    {
        $request->validate([
            'post_name' => 'required',
            'post_detail' => 'required',
        ]);
        
        $data = $request->all();
        if($data["id"])
        {
            $post = post::find($data["id"]);
        }
        else
        {
            $post = new Post();
        }
        $post->name = $data['post_name'];
        $post->detail = $data['post_detail'];
        $post->save();

        return response()->json([
            'message' => 'Post updated successfully',
            'status' => 200
        ]);
      
        
    }
}
