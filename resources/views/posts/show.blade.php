<?php
    use Carbon\Carbon;
?>
@extends('layouts.app')

@section('title') Show @endsection

@section('content')

    <div class="card" >
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <div>
                <span class="h6">Title</span>
                <span> :- {{ $post->title }}</span>
            </div>
            <div class="mt-3">
                <span class="h6">Description</span> <span> :- </span>
                <p>{{ $post->description }}</p>
            </div>
        </div>
    </div>

    <div class="card mt-4" >
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <div>
                <span class="h6">Name</span>
                <span> :- {{$post->user->name}}</span>
            </div>
            <div>
                <span class="h6">Email</span>
                <span> :- {{ $post->user->email }}</span>
            </div>
            <div>
                <span class="h6">Created At</span>
                <span> :- {{Carbon::parse($post->user->created_at)->format('l jS \\of F Y h:i:s A')}}</span>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Comments
        </div>
        <div class="card-body">
            <form action="{{route('posts.comments.store', ['post' => $post['id'], 'type' => get_class($post)])}}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="body" cols="15" rows="4" class="form-control" placeholder="Your comment here"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Commenter</label>
                    <select name="user_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-4"><h2>Comments</h2></div>
        @foreach($post->comments as $comment)
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <form class="delete-form" method="POST" action="{{route('posts.comments.destroy',['comment'=>$comment['id']])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-default text-danger float-right" type="submit" onclick="return confirm('you are about to delete this comment \nif you are sure press ok')">X</button>
                    </form>
                    {{$comment->user->name}}
                </div>

                <div class="card-body">
                    <div>
                        <span style="font-size: 1.2rem; font-weight: bold">Comment: </span>
                        {{$comment->body}}
                    </div>
                    <div>
                        <span style="font-size: 1rem; font-weight: bold">Created At: </span>
                        {{ \Carbon\Carbon::parse($comment->created_at)->format('l jS \\of F Y h:i:s A') }}
                    </div>
                </div>
            </div>
        @endforeach
@endsection
