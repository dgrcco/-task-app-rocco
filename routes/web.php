<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;

Route::get('/', [TaskController::class, 
'index'])->name('tasks.index'); 
Route::get('/tasks/create', [TaskController::class, 
'create'])->name('tasks.create'); 
Route::post('/tasks', [TaskController::class, 
'store'])->name('tasks.store'); 
Route::get('/tasks/{task}', [TaskController::class, 
'show'])->name('tasks.show'); 
Route::get('/tasks/{task}/edit', [TaskController::class, 
'edit'])->name('tasks.edit'); 
Route::put('/tasks/{task}', [TaskController::class, 
'update'])->name('tasks.update'); 
Route::delete('/tasks/{task}', [TaskController::class, 
'destroy'])->name('tasks.destroy');

//rotte per i commenti (delete e store)
Route::post('/tasks/{task}/comments/store', [CommentController::class, 
'store'])->name('comments.store');
Route::delete('/tasks/{task}/comments/delete/{comment}', [CommentController::class, 
'destroy'])->name('comments.destroy');
