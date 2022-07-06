@extends('dashboard')

@section('content')
<div class="post-show">
  <h1>{{ $post->title }}</h1>
  <h4>{{ $post->slug }}</h4>
  <p>{{ $post->content }}</p>
</div>
@endsection