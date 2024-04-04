<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;


// Authentication routes
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login'])->name('login');

// Feedback routes
Route::get('feedbacks', [FeedbackController::class, 'index']);
Route::get('feedbacks/{id}', [FeedbackController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Comment routes
    Route::post('feedbacks/{feedbackId}/comments', [CommentController::class, 'store']);
    Route::put('feedbacks/{feedbackId}/comments/{commentId}', [CommentController::class, 'update']);
    Route::delete('feedbacks/{feedbackId}/comments/{commentId}', [CommentController::class, 'destroy']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('feedbacks', [FeedbackController::class, 'store']);
    Route::put('feedbacks/{id}', [FeedbackController::class, 'update']);
    Route::delete('feedbacks/{id}', [FeedbackController::class, 'destroy']);
});
