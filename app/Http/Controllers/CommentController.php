<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {

        $post = Post::find($request->post_id);
        if($post) {
            $post->comments()->create([
                'user_id' => 1,
                'body' => $request->body
            ]);
            return redirect()->route('posts.show', ['id' => $post->id]);
        }
        return redirect()->route('posts.show', ['id' => $post->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        $post    = Post::find($comment->commentable_id);

        return view('comment.edit', ['post' => $post , 'comment'=> $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = $request->all();
        $postID = Comment::find($id)->commentable_id;
        Comment::where('id', $id)
            ->update([
                'body' => $comment['body']
            ]);
        return redirect()->route('posts.show', ['id' => $postID]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postID  = Comment::find($id)->commentable_id;
        if(comment::destroy($id)){
            return redirect()->route('posts.show', ['id' => $postID]);
        }
        return redirect()->route('posts.show', ['id' => $postID]);
    }
}
