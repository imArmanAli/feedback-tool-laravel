<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $feedbackId)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $feedback = Feedback::findOrFail($feedbackId);

        $comment = new Comment([
            'user_id' => auth()->id(),
            'content' => $validatedData['content'],
        ]);

        $feedback->comments()->save($comment);

        return response()->json(['message' => 'Comment added successfully', 'comment' => $comment]);
    }

    public function update(Request $request, $feedbackId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update($validatedData);

        return response()->json(['message' => 'Comment updated successfully', 'comment' => $comment]);
    }

    public function destroy($feedbackId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
