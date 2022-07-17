<?php

use App\Http\Controllers\Api\{
    CourseController, ModuleController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'course']);

Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);

Route::get('/', function(){
    return response()->json([
        'success' => true,
    ]);
});
