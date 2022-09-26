<?php

use App\Http\Controllers\ApiScraperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/professions', [ApiScraperController::class, 'scraper']);