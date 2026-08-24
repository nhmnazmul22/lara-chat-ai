<?php

use App\Http\Controllers\AIChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/ai-chat', [AIChatController::class, 'chatWithAI'])->name('chat-with-ai');
