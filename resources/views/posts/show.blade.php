@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Main Title -->
    <h1 class="text-center text-primary mb-4">{{ $post->title }}</h1>

    <!-- Post Details -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <!-- Information about the post -->
            <div class="d-flex justify-content-between mb-4">
                <span class="text-muted">Author: <b>{{ $post->user->name }}</b></span>
                <span class="text-muted">Created at: {{ $post->created_at->format('Y-m-d') }}</span>
            </div>

            <!-- Content of the post -->
            <div class="bg-light p-4 rounded-lg shadow-sm mb-5">
                <p class="text-dark">{{ $post->content }}</p>
            </div>

            <!-- Tags (Etiquetas) -->
            <div class="bg-light p-4 rounded-lg shadow-sm mb-5">
                <h5 class="text-primary mb-3">Etiquetas</h5>
                @if($post->etiquetas)
                    <div class="d-flex flex-wrap gap-2">
                        @foreach(json_decode($post->etiquetas) as $tag)
                            <span class="badge bg-info text-dark">{{ $tag }}</span>
                        @endforeach
                    </div>
                @else
                    <span class="badge bg-secondary">No tags available</span>
                @endif
            </div>

            <!-- Comments Section -->
            <div class="mt-5">
                <h5 class="text-success mb-3">Comments</h5>

                <!-- Display comment form if the user is authenticated -->
                @auth
                    <form action="{{ route('comments.store') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" class="form-control" placeholder="Add a comment..." required></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                @else
                    <!-- Show login message if the user is not authenticated -->
                    <p class="text-danger mb-4">You need to be logged in to comment.</p>
                    <a href="{{ route('login') }}" class="text-info">Login</a> or 
                    <a href="{{ route('register') }}" class="text-info">create an account</a> to leave a comment.
                @endauth

                <!-- List of Comments -->
                <table class="table table-bordered table-striped mt-4">
                    <tbody>
                        @foreach ($post->comments as $comment)
                        <tr>
                            <td class="text-dark">{{ $comment->content }}</td>
                            <td class="font-weight-bold text-primary">{{ $comment->user->name }}</td>
                            <!-- Only show delete option if the user is admin -->
                            @if(Auth::check() && Auth::user()->isAdmin())
                            <td>
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
