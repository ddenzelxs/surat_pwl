<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManagerController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LhsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware([RoleMiddleware::class . ':1'])->group(function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');

        Route::get('/student/lhs', [LhsController::class, 'create'])->name('student.lhs.create');
        Route::post('/student/lhs', [LhsController::class, 'store'])->name('student.lhs.store');
    });

    Route::middleware([RoleMiddleware::class . ':2'])->group(function (): void {
        Route::get('/lecturer', [StudentController::class, 'index'])->name('lecturer.index');
    });

    Route::middleware([RoleMiddleware::class . ':3'])->group(function () {
        Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');
        Route::get('/manager/student', [ManagerController::class, 'showStudent'])->name('manager.student');
        Route::get('/manager/lecturer', [ManagerController::class, 'showLecturer'])->name('manager.lecturer');
        Route::get('/manager/manager', [ManagerController::class, 'showManager'])->name('manager.manager');
        Route::get('/manager/create', [ManagerController::class, 'create'])->name('manager.create');
        Route::post('/manager/create', [ManagerController::class, 'store'])->name('manager.store');
        Route::get('/manager/{id}/edit', [ManagerController::class, 'edit'])->name('manager.edit');
        Route::put('/manager/{id}', [ManagerController::class, 'update'])->name('manager.update');
        Route::delete('/manager/{id}', [ManagerController::class, 'destroy'])->name('manager.destroy');
        Route::patch('/manager/{id}/toggle-status', [ManagerController::class, 'toggleStatus'])->name('manager.toggleStatus');
        Route::get('/manager/lhs', [LhsController::class, 'index'])->name('manager.lhs.index');

    });

});



Route::get('/auth/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/auth/register', [RegisteredUserController::class, 'store'])->name('register.store');

require __DIR__ . '/auth.php';
