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
        return 'we are in store';
    }

    public function show($postId)
    {
        return $postId;
    }
    public function edit($postId)
    {
        $posts=$this->getAllPosts();
        $index = -1;
        foreach ($posts as $key => $post){
            if($post['id']==$postId){
                $index=$key;
            }
        }
        $post=$posts[$index];
        return view('posts.edit',[
            'post'=>$post,
        ]);
    }
    public function update($postId)
    {
        return $this->index();
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
