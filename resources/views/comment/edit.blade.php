@extends('layouts.app')

@section('title') Create @endsection

@section('content')
<form method="post" action="{{route('comments.update', $comment['id'])}}">
    @csrf
    @method('PUT')
    <textarea class="form-control m-5" placeholder="Leave a comment here" name="body" style="height: 100px">{{$comment->body}}</textarea>
    <input class="form-control"  name="user_id" value="1" style="display: none">

    <div class="float-right">
        <button class="btn btn-warning my-3 mx-5 ">Upate Comment</button>
    </div>
</form>
@endsection
