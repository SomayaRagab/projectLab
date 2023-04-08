<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{



    public function index()
    {

        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show(int $id)
    {
        $post = Post::find($id);
        $comments =Comment::where('commentable_id', $id)->get();
        if($post){
            return view('posts.show', compact('post', 'comments'));
        }
        return redirect()->route('posts.index');
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(PostRequest $request)
    {
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function edit(int $id)
    {

        $post = Post::find($id);
        if($post){
            $users = User::all();
            return view('posts.edit', ['post' => $post , 'users'=> $users]);
        }
        return redirect()->route('posts.index');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, int $id)
    {
        $post = Post::find($id);
        if($post){
            $post->update($request->all());
            return redirect()->route('posts.show', ['id' => $id]);
        }
        return redirect()->route('posts.index');
    }


    public function destroy(int $id)
    {
        if(post::destroy($id)){
            return redirect()->route('posts.index');
        }
        return redirect()->route('posts.index');
    }
}
