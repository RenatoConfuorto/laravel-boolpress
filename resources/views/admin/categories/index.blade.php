@extends('dashboard')

@section('content')
    {{-- <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Nuovo</a> --}}
    <div class="ms_card-container">

        @foreach ($categories as $category)
            <div class="card">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                    <a href="{{ route('admin.categories.show', ['category' => $category->id]) }}" class="btn btn-primary">Vedi i post collegati</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
