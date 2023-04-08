@extends('layouts.app')

@section('title') Create @endsection

@section('content')
<form method="post" action="{{ route('posts.store') }}">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Post Creator</label>
        <select class="form-control" name="user_id">

            @foreach ($users as $user)
            <option value="{{$user->id}}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Submit</button>
</form>
@endsection
