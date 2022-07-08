@extends('dashboard')

@section('content')
<div class="post-show">
  <h1>{{ $post->title }}</h1>
  <h4>{{ $post->slug }}</h4>
  <p>{{ $post->content }}</p>

  <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Modifica</a>
  <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit" onclick="return confirm('Vuoi veramente cancellare questo post?')">Elimina</button>
  </form>
</div>
@endsection