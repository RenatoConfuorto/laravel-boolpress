@extends('dashboard')

@section('content')
  <div class="form-container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST">
      @method('PUT')
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Testo</label>
        <textarea class="form-control" id="content" name="content"> {{ $post->content }}</textarea>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    @endsection