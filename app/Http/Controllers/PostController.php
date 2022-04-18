<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=$this->getAllPosts();
        // dd($posts); for debugging
        return view('posts.index',[
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store()
    {
        $data = request()->all();
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);
        return to_route('posts.index');
    }

    public function show($postId)
    {
        return $postId;
    }
    public function edit($postId)
    {
        $users = User::all();
        $post=Post::find($postId);
        $selectedUser=User::find($post['user_id']);
        return view('posts.edit',[
            'users' => $users,
            'post'=>$post,
            'selectedUser'=>$selectedUser,
        ]);

    }
    public function update($postId)
    {
        $data = request()->all();
        Post::where('id', $postId)
            ->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);
        return to_route('posts.index');
    }
    public function destroy($postId)
    {
        return view('posts.index');
    }
    private function getAllPosts()
    {
        return Post::all();
    }

}
