<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    
    public function index()
    {
        $posts = Post::all();
        return view('post',compact('posts'));
    }
    
public function store(Request $request)
    {
        // dd($request->tags);
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            // 'tags' => 'required',
        ]);

        // $tag =$request->tags);
        // $tags=$request->tags;
        $tags = implode(',',$request->tags);
        $post=new Post;
        $post->title=$request->title;
        $post->body=$request->body;
        $post->tags=$tags;

    	$post->save();

      
       

        $post->tag($request->tags);


        return redirect('post')->with('success','Post created successfully');
    }
    public function create()
    {
        $posts = Post::all();
        return view('createpost',compact('posts'));
     }
}
