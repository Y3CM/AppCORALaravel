<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comment;
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

        public function create()
        {
            $categories = Categoria::all();
            
            return view('posts.create',compact( 'categories')); 
        }

    public function store(Request $request)
    {
        Post::create($request->all());

        return redirect()->route( 'posts.index');
    }

    public function show(Post $post)
    {
        // $comments = Comment::all();
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
        
        
        $post->update($request->all());

          /*   $post->title=$request->input('title') ;
            $post->slug=$request->input('slug') ;
            $post->image=$request->input('image') ;
            $post->resumen=$request->input('resumen') ;
            $post->category=$request->input('category') ;
            $post->content=$request->input('content') ;
            $post->is_published=$request->input('is_published');
            $post->save(); */

        return redirect()->route('posts.index');


    }

    public function destroy(Post $post)
    {
        // $post=Post::find($post);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function verificarPosts()
    {
        $Vposts=Post::orderBy('id', 'desc')->where('is_published', false)->get();

        return view('admin.posts.verificarPosts', compact('Vposts'));
    }

    public function publicados()
    {
        $posts = Post::orderBy('id', 'desc')->where('is_published',true)->get();

        return view('admin.posts.publicados', compact('posts'));
    }

    public static function countUnverifiedPosts()
{
    return Post::where('is_published', false)->count();
}
}
