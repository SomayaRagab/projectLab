@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header h3">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post['title']}}</h5>
            <p class="card-text">Description: {{$post['description']}}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header h3">
            Post Creator Info
        </div>
        <div class="card-body">
          <p  >Name: {{ $post->user->name }}</p>
          <p >email: {{ $post->user->email }}</p>
          <p >created_at: {{ \Carbon\Carbon::parse($post->created_at)->format('l jS \o\f F Y h:i:s A') }}</p>

        </div>
    </div>
    @include('comment.create')
    @include('comment.index')
@endsection
