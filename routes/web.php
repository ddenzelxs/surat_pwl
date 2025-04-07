<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManagerController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LhsController;
use App\Http\Controllers\SklController;
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

    // Mahasiswa
    Route::middleware([RoleMiddleware::class . ':1'])->group(function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');
        // Laporan Hasil studi
        Route::get('/student/lhs', [LhsController::class, 'index'])->name('student.lhs.index');
        Route::get('/student/lhs/create', [LhsController::class, 'create'])->name('student.lhs.create');
        Route::post('/student/lhs/create', [LhsController::class, 'store'])->name('student.lhs.store');
        // Surat Keterangan Lulus
        Route::get('/student/skl', [SklController::class, 'index'])->name('student.skl.index');
        Route::get('/student/skl/create', [SklController::class, 'create'])->name('student.skl.create');
        Route::post('/student/skl/create', [SklController::class, 'store'])->name('student.skl.store');

    });

    // Kepala Program Studi
    Route::middleware([RoleMiddleware::class . ':2'])->group(function (): void {
        Route::get('/lecturer', [LecturerController::class, 'index'])->name('lecturer.index');
        // Laporan Hasil Studi
        Route::get('/lecturer/lhs', [LhsController::class, 'index'])->name('lecturer.lhs.index');
        Route::put('/lhs/approve/{id}', [LhsController::class, 'approve'])->name('lhs.approve');
        Route::put('/lhs/reject/{id}', [LhsController::class, 'reject'])->name('lhs.reject');
        // Surat Keterangan Lulus
        Route::get('/lecturer/skl', [SklController::class, 'index'])->name('lecturer.skl.index');
        Route::put('/skl/approve/{id}', [SklController::class, 'approve'])->name('skl.approve');
        Route::put('/skl/reject/{id}', [SklController::class, 'reject'])->name('skl.reject');


    });

    // Manager Operasional
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
        // Laporan Hasil Studi
        Route::get('/manager/lhs', [LhsController::class, 'index'])->name('manager.lhs.index');
        Route::put('/manager/lhs/{id}/send-pdf', [LhsController::class, 'sendPdf'])->name('manager.lhs.sendPdf');
        // Surat Keterangan Lulus
        Route::get('/manager/skl', [SklController::class, 'index'])->name('manager.skl.index');
        Route::put('/manager/skl/{id}/send-pdf', [SklController::class, 'sendPdf'])->name('manager.skl.sendPdf');
    });

});



Route::get('/auth/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/auth/register', [RegisteredUserController::class, 'store'])->name('register.store');

require __DIR__ . '/auth.php';
