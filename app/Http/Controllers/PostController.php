<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(7);
        return view('posts.index', [
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

    public function store(StorePostRequest $request)
    {
        Post::create($request->only('title', 'description', 'user_id'));
        return to_route('posts.index');
    }

    public function show($postId)
    {
        $post=Post::find($postId);
        return view('posts.show',[
            'post'=>$post,
            'users' => User::all(),
        ]);
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

    public function update(StoreUpdateRequest $request)
    {
        $data = $request->all();
        Post::where('id',$data['id'])
            ->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);
        return to_route('posts.index');
    }

    public function destroy($postId)
    {
        Post::find($postId)->delete();
        return to_route('posts.index');
    }
}
