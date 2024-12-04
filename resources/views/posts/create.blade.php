@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center text-primary mb-5">Create a New Post</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Create Post Form</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-4">
                            <label for="content" class="form-label">Content:</label>
                            <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- User Selection -->
                        <div class="mb-4">
                            <label for="user_id" class="form-label">Select User:</label>
                            <select id="user_id" name="user_id" class="form-select" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Etiquetas (Tags) -->
                        <div class="mb-4">
                            <strong>Tags:</strong>
                            <div class="form-check">
                                @php
                                    // Example tags, replace with your dynamic tags from the database
                                    $tags = ['Animales', 'Trabajo', 'Escolar', 'Tecnologia', 'Politica', 'Familiar', 'Parejas', 'Culturales', 'Deportes', 'Juegos de palabras'];
                                @endphp
                                @foreach ($tags as $tag)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="etiquetas[]" value="{{ $tag }}" id="tag_{{ $tag }}">
                                        <label class="form-check-label" for="tag_{{ $tag }}">{{ $tag }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success w-100">Submit Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


