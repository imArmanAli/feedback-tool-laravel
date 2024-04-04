<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('comments')->latest()->paginate(10);
        return response()->json(['feedbacks' => $feedbacks]);
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category' => 'required|string|max:255',
            ]);

            $feedback = Feedback::create([
                'user_id' => auth()->id(),
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'category' => $validatedData['category'],
            ]);

            return response()->json(['feedback' => $feedback], 201);
        } else {
            return response()->json(['message' => "Login required"], 401);
        }
    }

    public function show($id)
    {
        $feedback = Feedback::with('comments.user')->findOrFail($id);
        return response()->json(['feedback' => $feedback]);
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
        ]);

        $feedback->update($validatedData);

        return response()->json(['message' => 'Feedback updated successfully', 'feedback' => $feedback]);
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return response()->json(['message' => 'Feedback deleted successfully']);
    }
}
