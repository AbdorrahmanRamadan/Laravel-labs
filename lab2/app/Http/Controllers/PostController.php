<?php

namespace App\Http\Controllers;

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
        return view('posts.create');
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
        return $posts = [
            ['id' => 1, 'title' => 'Laravel', 'post_creator' => 'Ahmed', 'created_at' => '2022-04-16 10:37:00'],
            ['id' => 2, 'title' => 'PHP', 'post_creator' => 'Mohamed', 'created_at' => '2022-04-16 10:37:00'],
            ['id' => 3, 'title' => 'Javascript', 'post_creator' => 'Ali', 'created_at' => '2022-04-16 10:37:00'],
        ];
    }

}
