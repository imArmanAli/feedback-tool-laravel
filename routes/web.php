<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', function (Request $request) {
    $referer = $request->headers->get('referer');

    if ($referer && strpos($referer, '/api/v1/') !== false) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
});
