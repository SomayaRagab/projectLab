@extends('layouts.app')

@section('title') Create @endsection

@section('content')
<form method="post" action="{{route('posts.update', $post['id'])}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" value="{{ $post->title }}" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control"   name="description" rows="3">{{ $post->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label" name="post_creator">Post Creator</label>
        <select class="form-control" name="post_creator">

            @foreach ( $users as $user )
            <option @if($user->id == $post->user_id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection
