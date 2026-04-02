<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created comment (Polymorphic on Post)
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:3',
            'post_id' => 'required|exists:posts,id',
        ]);

        $post = Post::findOrFail($request->post_id);

        $post->comments()->create([
            'body' => $request->body,
            'user_id' => 1, // لو مفيش auth مؤقتًا
        ]);

        return back()->with('success', 'Comment added successfully');
    }

    /**
     * Delete comment (optional)
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Comment deleted');
    }
}