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

        <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $post->title) }}">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">Nessuna</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <h3>Tags</h3>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input type="checkbox" name="tags[]" id="{{ $tag->id }}" value="{{ $tag->id }}"
                    {{ $post->tags->contains($tag) || in_array($tag, old('tags', [])) ? 'checked' : '' }}
                    >
                    <label for="{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
            <div class="mb-3">
                <label for="content" class="form-label">Testo</label>
                <textarea class="form-control" id="content" name="content"> {{ old('content', $post->content) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image" >Immagine</label>
                <input type="file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
