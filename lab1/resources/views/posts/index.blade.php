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
                <td>{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['post_creator'] }}</td>
                <td>{{ $post['created_at'] }}</td>
                <td>
                    <x-button type="primary" href="{{ route('posts.show', ['post' => $post['id']]) }}"> View </x-button>
                    <x-button type="secondary" href="{{ route('posts.edit', ['post' => $post['id']]) }}"> Edit </x-button>
                    <x-button type="danger" href=""> Delete </x-button>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
@endsection
