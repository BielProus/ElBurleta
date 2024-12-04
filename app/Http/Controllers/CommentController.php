<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        // Create the comment first
        $comment = Comment::create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
        ]);

        // Handle tags if provided
        if ($request->has('etiquetas')) {
            // Assuming 'etiquetas' is an array of strings
            $comment->etiquetas = json_encode($request->input('etiquetas'));
            $comment->save();
        }

        return redirect()->back()->with('success', 'Comentario creado exitosamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if (Auth::check() && Auth::user()->id === 12) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comentario eliminado exitosamente.');
        }
        
        return redirect()->back()->with('error', 'No tienes permiso para realizar esta acción.');
        
    }
}
