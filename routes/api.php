<?php

use App\Http\Controllers\Api\{
    CourseController, LessonController, ModuleController, ReplySupportController, SupportController
};
use App\Http\Controllers\Api\Auth\{
    AuthController,ResetPasswordController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Autenticação
Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

//Recuperar senha
Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLink'])->middleware('guest');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->middleware('guest');

//Endpoints da api
Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'course']);

    Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);

    Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
    Route::get('/lessons/{id}', [LessonController::class, 'show']);

    Route::post('/lessons/viewed', [LessonController::class, 'viewed']);

    Route::get('/supports/my', [SupportController::class, 'mySupports']);
    Route::get('/supports', [SupportController::class, 'index']);
    Route::post('/supports', [SupportController::class, 'store']);

    Route::post('/supports/{id}/replies', [ReplySupportController::class, 'createReply']);
});

Route::get('/', function(){
    return response()->json([
        'success' => true,
    ]);
});
