<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/tasks/done', [TaskController::class, 'done']);
Route::get('/tasks/undone', [TaskController::class, 'undone']);

Route::get('/create-tasks', [TaskController::class, 'create']);
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::get('/tasks/{id}/delete', [TaskController::class, 'delete']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
