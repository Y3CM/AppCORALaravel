<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $comments = Comment::all();

      /*   $request->validate([
            'content' => 'required|string',
        ]); */

        $comment = new Comment();
        $comment->content = $request->input('comment');
        $comment->id_user = Auth::user()->number_document;
        $comment->post_id = $post->id;
        $comment->save();
         
        
        return redirect()->route('posts.show',compact('comments','post'));
    }
}
