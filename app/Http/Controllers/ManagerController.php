<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index() {
        return view('manager.index');
    }

    public function showStudent() {
        $students = Users::where('role', 0)->get();
        return view('manager.student', compact('students'));
    }

    public function showLecturer() {
        $lecturers = Users::where('role', 1)->get();
        return view('manager.lecturer', compact('lecturers'));
    }

    public function create() {
        return view('manager.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nrp_nip' => ['required', 'string', 'max:20', 'unique:users,nrp_nip'],
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', 'in:0,1,2,3'],
        ]);
        // 0 mahasiswa, 1 Dosen, 2 Kaprodi, 3 Manajer Operasiona
        $lecturer = new Users($request->all());
        $lecturer->password = bcrypt($request->password);
        $lecturer->status = 1;
        $lecturer->save();
        return redirect()->route('manager.index')
        ->with('status', 'Data berhasil ditambahkan');
        
    }
}
