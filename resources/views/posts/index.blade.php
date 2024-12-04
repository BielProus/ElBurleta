@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Main Title -->
    <h1 class="text-center text-primary mb-4">ElBurleta</h1>

    <!-- Button to create a new post -->
    <div class="text-end mb-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle"></i> Crear
        </a>
    </div>

    <!-- List of posts -->
    <div class="card shadow-lg border-info">
        <div class="card-body">
            <h5 class="card-title text-success">Nuestros Chistes</h5>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Chistes</th>
                        <th>Etiquetas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-primary">
                                    {{ $post->title }}
                                </a>
                            </td>

                            <!-- Etiquetas (Tags) -->
                            <td>
                                @if($post->etiquetas)
                                    <!-- Display each tag as a colorful badge -->
                                    <ul class="list-inline mb-0">
                                        @foreach(json_decode($post->etiquetas) as $tag)
                                            <li class="list-inline-item">
                                                <span class="badge rounded-pill bg-info text-dark">{{ $tag }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="badge rounded-pill bg-secondary">No tags</span> <!-- Display message if no tags -->
                                @endif
                            </td>

                            <!-- Actions (Edit/Delete) -->
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm text-white">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
