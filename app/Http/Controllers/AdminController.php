<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Prodi;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'totalUsers' => Users::count(),
            'totalMahasiswa' => Users::where('role_id', 1)->count(),
            'totalDosen' => Users::where('role_id', 2)->count(),
            'totalProdi' => Prodi::count(),
        ]);
    }


    public function showStudent()
    {
        $students = Users::with('prodi')->where('role_id', 1)->get();
        return view('admin.student', compact('students'));
    }

    public function showLecturer()
    {
        $lecturers = Users::with('prodi')->where('role_id', 2)->get();
        return view('admin.lecturer', compact('lecturers'));
    }

    public function showManager()
    {
        $managers = Users::with('prodi')->where('role_id', 3)->get();
        return view('admin.manager', compact('managers'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        $roles = Role::all();

        return view('admin.create', compact('prodis', 'roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nrp_nip' => ['required', 'string', 'max:20', 'unique:users,nrp_nip'],
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role_id' => ['required', 'integer', 'exists:role,id'],
            'prodi_id' => ['required', 'integer', 'exists:prodi,id'],
        ]);

        if ($request->role_id == 2) {
            $existingKaprodi = Users::where('role_id', 2)
                ->where('prodi_id', $request->prodi_id)
                ->where('status', 1)
                ->first();

            if ($existingKaprodi) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['prodi_id' => 'Sudah ada Kaprodi aktif untuk program studi ini. Nonaktifkan terlebih dahulu.']);
            }
        }

        $user = new Users([
            'nrp_nip' => $request->nrp_nip,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'prodi_id' => $request->prodi_id,
            'status' => 1
        ]);

        $user->save();

        switch ($request->role_id) {
            case 1: // Mahasiswa
                return redirect()->route('admin.student')->with('status', 'Data berhasil ditambahkan');
            case 2: // Kaprodi
                return redirect()->route('admin.lecturer')->with('status', 'Data berhasil ditambahkan');
            case 3: // admin Operasional
                return redirect()->route('admin.manager')->with('status', 'Data berhasil ditambahkan');
            default:
                return redirect()->route('admin.index')->with('status', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $user = Users::findOrFail($id);
        $roles = Role::all();
        $prodis = Prodi::all();

        return view('admin.edit', compact('user', 'roles', 'prodis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nrp_nip' => ['required', 'string', 'max:20', "unique:users,nrp_nip,$id,nrp_nip"],
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', "unique:users,email,$id,nrp_nip"],
            'password' => ['nullable', 'string', 'min:6'],
            'status' => ['required', 'in:0,1'],
            'role_id' => ['required', 'integer', 'exists:role,id'],
            'prodi_id' => ['required', 'integer', 'exists:prodi,id'],
        ]);

        $user = Users::findOrFail($id);

        $user->nrp_nip = $request->nrp_nip;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->prodi_id = $request->prodi_id;
        $user->status = $request->status;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        switch ($request->role_id) {
            case 1: // Mahasiswa
                return redirect()->route('admin.student')->with('status', 'Data berhasil ditambahkan');
            case 2: // Kaprodi
                return redirect()->route('admin.lecturer')->with('status', 'Data berhasil ditambahkan');
            case 3: // admin Operasional
                return redirect()->route('admin.manager')->with('status', 'Data berhasil ditambahkan');
            default:
                return redirect()->route('admin.index')->with('status', 'Data berhasil ditambahkan');
        }
    }

    public function toggleStatus($id)
    {
        $user = Users::findOrFail($id);
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();

        return redirect()->back()->with('status', 'Status pengguna berhasil diperbarui.');
    }
}
