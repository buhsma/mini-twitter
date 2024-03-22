<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TweepController;

Route::get('/tweets', [TweetController::class, 'index']);
Route::get('/tweets/{id}', [TweetController::class, 'show']);
Route::get('/{userId}/tweets', [TweetController::class, 'getTweetsByUserId']);
Route::post('/tweets', [TweetController::class, 'store']);
Route::put('/tweets/{id}', [TweetController::class, 'update']);
Route::delete('/tweets/{id}', [TweetController::class, 'destroy']);

Route::post('/', [TweepController::class, 'googleSignIn']);

Route::get("/test-me", function () {
    return 'Hallo vom Laravel Backend!';
});