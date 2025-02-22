<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
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
    public function store(StoreCommentRequest $request, $id)
    {
        // Find the announcement by ID
        $announcement = Announcements::find($id);

        if (!$announcement) {
            return redirect()->back()->with('error', 'Announcement not found!');
        }

        // Get authenticated user ID or default to 1
        $userId = Auth::id() ?: 1;

        // Debugging
        var_dump($announcement->id);
        echo $userId;

        // Create the comment
        $comment = Comment::create([
            'user_id' => $userId,
            'announce_id' => $announcement->id, // Correct way to store the ID
            'content' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Comment $commnet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $commnet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $commnet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $commnet)
    {
        //
    }
}
