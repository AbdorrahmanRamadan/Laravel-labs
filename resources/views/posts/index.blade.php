<?php
use Carbon\Carbon;
?>
@extends('layouts.app')

@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
        </div>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $posts as $post)
                <tr>
                    <td>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{$post->user ? $post->user->name : 'Not Found'}}</td>
                    <td>{{Carbon::parse($post->created_at)->format('Y-m-d') }}</td>
                    <td>
                        <x-button type="primary" href="{{ route('posts.show', ['post' => $post['id']]) }}"> View </x-button>
                        <x-button type="secondary" href="{{ route('posts.edit', ['post' => $post['id']]) }}"> Edit </x-button>
                        <form method="POST" action="{{route('posts.destroy',['post'=>$post['id']])}}" style="display: inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('you are about to delete this record \nif you are sure press ok')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>

@endsection
