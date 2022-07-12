@extends('dashboard')

@section('content')

    <div class="ms_card-container">

        @foreach ($posts as $post)
            <div class="card">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Vedi il post</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
