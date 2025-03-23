<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ManagerController;


Route::get('/', function () {
    return view('dash');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index'); // Main Manager Dashboard
Route::get('/manager/student', [ManagerController::class, 'showStudent'])->name('manager.student');
Route::get('/manager/lecturer', [ManagerController::class, 'showLecturer'])->name('manager.lecturer');
Route::get('/manager/create', [ManagerController::class, 'create'])->name('manager.create');
Route::post('/manager/create', [ManagerController::class, 'store'])->name('manager.store');

require __DIR__.'/auth.php';

