<?php

namespace App\Http\Controllers;
use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index() {
        return view('manager.index');
    }

    public function showStudent() {
        $students = Manager::where('role', 0)->get();
        return view('manager.student', compact('students'));
    }

    public function showLecturer() {
        $lecturers = Manager::where('role', 1)->get();
        return view('manager.lecturer', compact('lecturers'));
    }
}
