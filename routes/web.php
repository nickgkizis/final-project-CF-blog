<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;


// Main page with links to user management, registration, login, and article creation
Route::get('/', function () {
    return view('main');  // This will be the new main page view
});

// User management routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


// Registration Routes
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

// Login Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// Logout Route
// Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

// Article Routes
Route::resource('articles', ArticleController::class);


// Dashboard or user homepage (protected by auth middleware)
Route::get('/dashboard', function () {
    return 'Welcome to your dashboard!';
})->middleware('auth');
