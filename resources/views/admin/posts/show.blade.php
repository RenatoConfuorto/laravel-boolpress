@extends('dashboard')

@section('content')
<div class="post-show">
  <h1>{{ $post->title }}</h1>
  <h4>{{ $post->slug }}</h4>
  <p>{{ $post->content }}</p>

  <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Modifica</a>
</div>
@endsection