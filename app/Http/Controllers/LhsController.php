<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lhs;
use Illuminate\Support\Facades\Auth;

class LhsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Mahasiswa
        if ($user->role_id == 1) {
            $lhsList = Lhs::where('nrp_nip', $user->nrp_nip)->get();
            return view('student.lhs.index', compact('lhsList'));
        }
        // Kaprodi
        elseif ($user->role_id == 2) {
            $lhsList = Lhs::whereHas('user', function ($query) use ($user) {
                $query->where('prodi_id', $user->prodi_id);
            })->get();
            return view('lecturer.lhs.index', compact('lhsList'));
        }
        // Manager Operasional
        elseif ($user->role_id == 3) {
            $lhsList = Lhs::where('status', 1)->get();
            return view('manager.lhs.index', compact('lhsList'));
        }
        // Role lain
        else {
            abort(403, 'Akses ditolak.');
        }

        
    }

    public function create()
    {
        return view('student.lhs.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keperluan_pembuatan_laporan' => 'required|string',
        ]);

        $user = Auth::user();

        Lhs::create([
            'id' => time(),
            'nrp_nip' => $user->nrp_nip,
            'nama_lengkap' => $user->nama_lengkap,
            'keperluan_pembuatan_laporan' => $request->keperluan_pembuatan_laporan,
            'status' => 0, 
        ]);

        return redirect()->route('student.index')->with('status', 'Form berhasil diajukan');
    }
}
