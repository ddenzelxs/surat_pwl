<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Prodi;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.index');
    }

    public function showStudent()
    {
        $students = Users::with('prodi')->where('role_id', 1)->get();
        return view('manager.student', compact('students'));
    }

    public function showLecturer()
    {
        $lecturers = Users::with('prodi')->where('role_id', 2)->get();
        return view('manager.lecturer', compact('lecturers'));
    }

    public function showManager()
    {
        $managers = Users::with('prodi')->where('role_id', 3)->get();
        return view('manager.manager', compact('managers'));
    }

}
