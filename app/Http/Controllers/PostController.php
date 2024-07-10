<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('id', 'desc')->where('is_published', true)->get();
        $categories=Categoria::all();
       
        return view('posts.index',compact('posts','categories'));
    }

        public function create(Categoria $categories)
        {
            return view('posts.create',compact( 'categories')); 
        }

    public function store(Request $request)
    {
        Post::create($request->all());

        return redirect()->route( 'posts.index');
    }

    public function show(Post $post)
    {
        $post = Post::with('user')->where('id', $post->id)->firstOrFail();   
        $categories=Categoria::all();
        $posts=Post::orderBy('id', 'desc')->where('is_published', true)->take(10)->get();
        return view('posts.show',compact('post','categories','posts'));
    }


    public function edit(Post $post)
    {
        $categories=Categoria::all();
        return view('posts.edit',compact('post','categories'));
    }

    public function update(Request $request,Post $post)
    {
        
        //    forma manual de actualizar e insertar datos     
        $post=Post::find($post);
            $post->title=$request->title;
            $post->slug=$request->slug;
            $post->image=$request->image;
            $post->resumen=$request->resumen;
            $post->category=$request->category;
            $post->content=$request->content;
            $post->is_published=false;
            $post->save();

        return redirect()->route('posts.index');


    }

    public function destroy(Post $post)
    {
        // $post=Post::find($post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
