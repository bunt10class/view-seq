<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

\ViewSeq\Http\Routes\UniverseRoute::initRoutes();

Route::get('search', [\ViewSeq\Http\Controllers\SearchController::class, 'search']);
