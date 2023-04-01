<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class PostController extends Controller
{

    private $allPosts = [
        [
            'id' => 1,
            'title' => 'Laravel',
            'description' => 'hello laravel',
            'posted_by' => 'Ahmed',
            'created_at' => '2023-04-01 10:00:00',
        ],

        [
            'id' => 2,
            'title' => 'PHP',
            'description' => 'hello php',
            'posted_by' => 'Mohamed',
            'created_at' => '2023-04-01 10:00:00',
        ],

        [
            'id' => 3,
            'title' => 'Javascript',
            'description' => 'hello javascript',
            'posted_by' => 'Mohamed',
            'created_at' => '2023-04-01 10:00:00',
        ],
    ];
    public function test()
    {
        $books = ['b1', 'b2'];

//        dd($books);

        return view('test', [
                'books' => $books,
                'name' => 'Ahmed'
            ]
        );
    }

    public function index()
    {


        return view('posts.index',[
            'posts' => $this->allPosts,
        ]);
    }

    public function show(int $id)
    {
        $post = [
            'id' => 3,
            'title' => 'Javascript',
            'description' => 'hello javascript',
            'posted_by' => 'Mohamed',
            'created_at' => '2023-04-01 10:00:00',
        ];

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('posts.index');
    }

    public function edit(int $id)
    {
        $post = [
            'id' => $id,
            'title' => 'Javascript',
            'description' => 'hello javascript',
            'posted_by' => 'Mohamed',
            'created_at' => '2023-04-01 10:00:00',
        ];

        return view('posts.edit', ['post' => $post]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        return redirect()->route('posts.show', ['id' => $id]);

    }


    public function destroy(int $id)
    {
        return redirect()->route('posts.index');
    }
}