@extends('layouts.app')

@section('title')Create @endsection

@section('content')
        <form method="POST" enctype="multipart/form-data" action="{{ route('posts.store')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFileSm" class="form-label">post photo</label>
                <input class="form-control form-control-sm" value="{{old('postPhoto','')}}"name='postPhoto' id="formFileSm" type="file">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

          <button class="btn btn-success" type="submit">Create</button>
        </form>
@endsection

