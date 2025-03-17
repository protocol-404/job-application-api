<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CVController;
use App\Http\Controllers\Api\JobOfferController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\CheckRecruiterRole;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/job-offers', [JobOfferController::class, 'index']);
Route::get('/job-offers/{jobOffer}', [JobOfferController::class, 'show']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);

    // User routes
    Route::get('/user', [UserController::class, 'show']);
    Route::put('/user', [UserController::class, 'update']);
    Route::get('/user/skills', [UserController::class, 'skills']);
    Route::post('/user/skills', [UserController::class, 'addSkill']);
    Route::delete('/user/skills/{skill}', [UserController::class, 'removeSkill']);

    // CV routes
    Route::get('/cvs', [CVController::class, 'index']);
    Route::post('/cvs', [CVController::class, 'store']);
    Route::delete('/cvs/{cv}', [CVController::class, 'destroy']);

    // Application routes
    Route::get('/applications', [ApplicationController::class, 'index']);
    Route::post('/applications', [ApplicationController::class, 'store']);

    // Recruiter routes - CHANGED FROM 'recruiter' to CheckRecruiterRole::class
    Route::middleware(['auth:sanctum', CheckRecruiterRole::class])->group(function () {
        Route::post('/job-offers', [JobOfferController::class, 'store']);
        Route::put('/job-offers/{jobOffer}', [JobOfferController::class, 'update']);
        Route::delete('/job-offers/{jobOffer}', [JobOfferController::class, 'destroy']);
        Route::get('/job-offers/{jobOffer}/applications', [JobOfferController::class, 'applications']);
    });
});
