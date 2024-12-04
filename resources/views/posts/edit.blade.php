@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Title -->
    <h1 class="text-center text-primary mb-5">Edit Post #{{ $post->id }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Post</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-4">
                            <label for="content" class="form-label">Content:</label>
                            <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Etiquetas (Tags) -->
                        <div class="mb-4">
                            <label for="etiquetas" class="form-label">Tags (separate with commas):</label>
                            <input type="text" name="etiquetas" id="etiquetas" class="form-control @error('etiquetas') is-invalid @enderror" value="{{ old('etiquetas', implode(',', json_decode($post->etiquetas ?? '[]'))) }}" required>
                            @error('etiquetas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success w-100">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


