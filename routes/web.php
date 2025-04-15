<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManagerController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LhsController;
use App\Http\Controllers\SklController;
use App\Http\Controllers\SmahaktifController;
use App\Http\Controllers\SmatkulController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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
        // Surat Mahasiswa Aktif
        Route::get('/student/smahaktif', [SmahaktifController::class, 'index'])->name('student.smahaktif.index');
        Route::get('/student/smahaktif/create', [SmahaktifController::class, 'create'])->name('student.smahaktif.create');
        Route::post('/student/smahaktif/create', [SmahaktifController::class, 'store'])->name('student.smahaktif.store');
        // Surat Keterangan Mata Kuliah
        Route::get('/student/smatkul', [SmatkulController::class, 'index'])->name('student.smatkul.index');
        Route::get('/student/smatkul/create', [SmatkulController::class, 'create'])->name('student.smatkul.create');
        Route::post('/student/smatkul/create', [SmatkulController::class, 'store'])->name('student.smatkul.store');
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
        // Surat Mahasiswa Aktif
        Route::get('/lecturer/smahaktif', [SmahaktifController::class, 'index'])->name('lecturer.smahaktif.index');
        Route::put('/smahaktif/approve/{id}', [SmahaktifController::class, 'approve'])->name('smahaktif.approve');
        Route::put('/smahaktif/reject/{id}', [SmahaktifController::class, 'reject'])->name('smahaktif.reject');
        // Surat Keterangan Mata Kuliah
        Route::get('/lecturer/smatkul', [SmatkulController::class, 'index'])->name('lecturer.smatkul.index');
        Route::put('/smatkul/approve/{id}', [SmatkulController::class, 'approve'])->name('smatkul.approve');
        Route::put('/smatkul/reject/{id}', [SmatkulController::class, 'reject'])->name('smatkul.reject');
    });

    // Manager Operasional
    Route::middleware([RoleMiddleware::class . ':3'])->group(function () {
        Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');
        Route::get('/manager/student', [ManagerController::class, 'showStudent'])->name('manager.student');
        Route::get('/manager/lecturer', [ManagerController::class, 'showLecturer'])->name('manager.lecturer');
        Route::get('/manager/manager', [ManagerController::class, 'showManager'])->name('manager.manager');
        // Laporan Hasil Studi
        Route::get('/manager/lhs', [LhsController::class, 'index'])->name('manager.lhs.index');
        Route::put('/manager/lhs/{id}/send-pdf', [LhsController::class, 'sendPdf'])->name('manager.lhs.sendPdf');
        // Surat Keterangan Lulus
        Route::get('/manager/skl', [SklController::class, 'index'])->name('manager.skl.index');
        Route::put('/manager/skl/{id}/send-pdf', [SklController::class, 'sendPdf'])->name('manager.skl.sendPdf');
        // Surat Mahasiswa Aktif
        Route::get('/manager/smahaktif', [SmahaktifController::class, 'index'])->name('manager.smahaktif.index');
        Route::put('/manager/smahaktif/{id}/send-pdf', [SmahaktifController::class, 'sendPdf'])->name('smahaktif.sendPdf');
        // Surat Keterangan Mata Kuliah
        Route::get('/manager/smatkul', [SmatkulController::class, 'index'])->name('manager.smatkul.index');
        Route::put('/manager/smatkul/{id}/send-pdf', [SmatkulController::class, 'sendPdf'])->name('smatkul.sendPdf');
    });

    //Admin
    Route::middleware([RoleMiddleware::class . ':4'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/student', [AdminController::class, 'showStudent'])->name('admin.student');
        Route::get('/admin/lecturer', [AdminController::class, 'showLecturer'])->name('admin.lecturer');
        Route::get('/admin/manager', [AdminController::class, 'showadmin'])->name('admin.manager');
        Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::patch('/admin/{id}/toggle-status', [AdminController::class, 'toggleStatus'])->name('admin.toggleStatus');
        // Laporan Hasil Studi
        Route::get('/admin/lhs', [LhsController::class, 'index'])->name('admin.lhs.index');
        Route::put('/admin/lhs/{id}/send-pdf', [LhsController::class, 'sendPdf'])->name('admin.lhs.sendPdf');
        // Surat Keterangan Lulus
        Route::get('/admin/skl', [SklController::class, 'index'])->name('admin.skl.index');
        Route::put('/admin/skl/{id}/send-pdf', [SklController::class, 'sendPdf'])->name('admin.skl.sendPdf');
        // Surat Mahasiswa Aktif
        Route::get('/admin/smahaktif', [SmahaktifController::class, 'index'])->name('admin.smahaktif.index');
        Route::put('/admin/smahaktif/{id}/send-pdf', [SmahaktifController::class, 'sendPdf'])->name('smahaktif.sendPdf');
        // Surat Keterangan Mata Kuliah
        Route::get('/admin/smatkul', [SmatkulController::class, 'index'])->name('admin.smatkul.index');
        Route::put('/admin/smatkul/{id}/send-pdf', [SmatkulController::class, 'sendPdf'])->name('smatkul.sendPdf');
    });

});

Route::get('/auth/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/auth/register', [RegisteredUserController::class, 'store'])->name('register.store');

require __DIR__ . '/auth.php';
