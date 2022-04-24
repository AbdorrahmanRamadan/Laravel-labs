<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::with('user')->paginate());
    }

    public function create()
    {
        //
    }

    public function store(StorePostRequest  $request)
    {
        return Post::create($request->only('title', 'description', 'user_id'));
    }

    public function show(POST $post)
    {
        return new PostResource($post);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
