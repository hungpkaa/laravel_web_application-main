<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectApiController;

// Projects RESTful API
Route::apiResource('projects', ProjectApiController::class);
